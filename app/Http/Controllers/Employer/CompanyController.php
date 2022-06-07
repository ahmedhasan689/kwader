<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();

        $company = Company::where('employer_id', Auth::user()->id)->first();



        if( $company ) {
            $contact = Contact::where('company_id', $company->id)->first();
            return view('employer.company.index', compact('countries', 'contact' ,'company'));
        }else{

            return view('employer.company.index', compact('countries'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('employer.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|min:3|max:255',
            'legal_status' => 'required',
            'registration_number' => 'nullable|numeric',
            'country_id' => 'required',
            'postal' => 'required|numeric',
            'address' => 'nullable|min:5|max:255',
        ]);

        $image = null;

        if ($request->hasFile('visual_identity')) {
            $file = $request->file('visual_identity'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'visual_identity',
            ]);

            $image = $image_path;
        }else{
            $image = null;
        }
        Company::create([
            'company_name' => $request->company_name,
            'legal_status' => $request->legal_status,
            'visual_identity' => $image,
            'registration_number' => $request->registration_number,
            'postal' => $request->postal,
            'address' => $request->address,
            'employer_id' => Auth::user()->id,
            'country_id' => $request->country_id,
        ]);

        Contact::create([
            'company_id' => Company::latest()->first()->id,
        ]);

        toastr()->success('تم تسجيل بيانات الشركة بنجاح');

        return redirect()->route('employer.dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
