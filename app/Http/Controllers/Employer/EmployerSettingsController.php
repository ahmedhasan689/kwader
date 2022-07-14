<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerSettingsController extends Controller
{
    public function index($id)
    {
        $employer = Employer::where('user_id', Auth::user()->id)->first();

        return view('employer.settings.index');
    }
}
