<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\FinancialTransactions;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;



class PaypalController extends Controller
{
    /**
     * @var PayPalCheckoutSdk\Core\PayPalHttpClient
     */
    protected $client;

    public function __construct()
    {
        $this->client = App::make('paypal.client');
    }

    public function createPayment($total)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "value" => $total,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => url(route('financial.CancelPayment')),
                "return_url" => url(route('financial.CallbackPayment'))
            ],
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $this->client->execute($request);

            if($response && $response->statusCode == 201) {
                $links = collect($response->result->links);

                $link = $links->where('rel', '=', 'approve')->first();

                return redirect()->away($link->href);

            };
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
//            print_r($response);

        }catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function callback()
    {
        $paypal_order_id = request()->query('token');

        $request = new OrdersCaptureRequest($paypal_order_id);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call

            $response = $this->client->execute($request);

            if($response && $response->statusCode == 201) {
                $employer = Employer::where('user_id', Auth::user()->id)->first();
                $job = Job::where('employer_id', $employer->id)->latest();
                $job->update([
                    'status' => 'Opened'
                ]);

                $total = null;
                foreach($response->result->purchase_units as $unit){
                    $total = $unit->amount->value;
                };

                FinancialTransactions::create([
                    'employer_id' => $employer->id,
                    'amount' => $total,
                    'transaction_number' => '#'.str_pad(0 + 1, 8, "0", STR_PAD_LEFT),
                ]);

                return redirect()->route('job.create', ['step' => 4]);
            }
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
//            dd($response);
        }catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }
}
