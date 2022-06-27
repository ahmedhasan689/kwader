<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PayPalHttp\HttpException;
use PaypalPayoutsSDK\Core\PayPalHttpClient;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;
use Sample\CreatePayoutSample;
use Sample\PayPalClient;


class PaypalController extends Controller
{
    /**
     * @var mixed|PayPalHttpClient
     */
    protected $client;

    public function __construct()
    {
        $this->client = App::make('paypal.client');
    }

    public function buildRequestBody()
    {
        return json_decode(
            '{
                "sender_batch_header":
                {
                  "sender_batch_id": "Payouts_2018_100008",
                  "email_subject": "SDK payouts test txn"
                },
                "items": [
                {
                  "recipient_type": "EMAIL",
                  "receiver": "payouts2342@paypal.com",
                  "note": "Your 50$ payout",
                  "sender_item_id": "1",
                  "amount":
                  {
                    "currency": "USD",
                    "value": "50"
                  }
                }]
              }',
            true
        );
    }

    public function CreatePayout($debug = false)
    {
        try {
            $request = new PayoutsPostRequest();
            $request->body = self::buildRequestBody();
            $this->client = PayPalClient::client();
            $response = $this->client->execute($request);
            if ($debug) {
                print "Status Code: {$response->statusCode}\n";
                print "Status: {$response->result->batch_header->batch_status}\n";
                print "Batch ID: {$response->result->batch_header->payout_batch_id}\n";
                print "Links:\n";
                foreach ($response->result->links as $link) {
                    print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
                }
                // To toggle printing the whole response body comment/uncomment below line
                echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
            }
            return $response;
        } catch (HttpException $e) {
            //Parse failure response
            echo $e->getMessage() . "\n";
            $error = json_decode($e->getMessage());
//            echo $error->message . "\n";
//            echo $error->name . "\n";
//            echo $error->debug_id . "\n";
        }
    }
}


