<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['notifications'] = Auth::user()->notifications;
        $data['employees'] = Employee::all();
        $data['female_employees'] = Employee::where('gender', 'female')->count();
        $data['male_employees'] = Employee::where('gender', 'male')->count();
        $data['last_employees'] = Employee::orderBy('created_at', 'desc')->paginate(5);
        $data['last_employers'] = Employer::orderBy('created_at', 'desc')->paginate(5);
        $data['female_employers'] = Employer::where('gender', 'female')->count();
        $data['male_employers'] = Employer::where('gender', 'male')->count();
        $data['employers'] = Employer::all();
        $data['jobs'] = Job::where('status', 'Opened')->get();

        return view('Dashboard.index', $data);
    }

    public function master()
    {
        $user = Auth::user();
        $notifications  = $user->notifications;

        return view('layouts.main-header', compact('notifications'));
    }
}
