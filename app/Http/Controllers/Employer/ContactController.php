<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Store Contact Form
     */
    public function store(Request $request)
    {


    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request)
    {
        $company = Company::where('employer_id', Auth::user()->id)->first();

        if ($company) {

            $request->validate([
                'company_email' => ['nullable', 'email'],
                'company_website' => ['nullable', 'active_url'],
                'company_phone' => ['nullable', 'numeric'],
                'company_fax' => ['nullable', 'numeric'],
            ]);

            $contact = Contact::where('company_id', $company->id)->first();


            $contact->update([
                'company_email' => $request->company_email,
                'website' => $request->company_website,
                'phone_number' => $request->company_phone,
                'fax_number' => $request->company_fax,
            ]);

            toastr()->success('تم إنشاء بيانات الإتصال بنجاج');
            return redirect()->route('employer.dashboard.index');

        }else {

            toastr()->error('يرجى تسجيل البيانات القانونية أولاً');
            return redirect()->back();
        }
    }
}
