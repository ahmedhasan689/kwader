<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        $contacts = ContactUs::all();
        return view('Dashboard.contact_us.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create([
           'name' => $request->full_name,
           'email' => $request->email,
           'phone_number' => $request->phone_number,
           'message' => $request->message,
        ]);

        toastr()->success('تم إرسال رسالتك، نشكرك على التواصل معنا');

        return redirect()->route('homepage');
    }

    public function show()
    {

    }
}
