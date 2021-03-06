<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use App\Models\FinancialTransactions;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $transactions = null;
        if (Auth::user()->user_type == 'Employer'){
            $employer = Employer::where('user_id', Auth::user()->id)->first();
            $transactions = FinancialTransactions::where('employer_id', $employer->id)->get();
        }elseif(Auth::user()->user_type == 'Employee') {
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $transactions = FinancialTransactions::where('employee_id', $employee->id)->get();
        }

        return view('Contract.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($job, $employee)
    {
        $specific_job = Job::findOrFail($job);
        $specific_employee = Employee::findOrFail($employee);
        return view('Contract.create', compact('specific_job', 'specific_employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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

    public function totalSalary(Request $request)
    {
        if ($request->duration == '??????'){

            $total = (1 * $request->salary) + 50;

        }elseif($request->duration == '??????????'){

            $total = (2 * $request->salary) + 50;

        }elseif($request->duration == '???????? ????????'){

            $total = (3 * $request->salary) + 50;

        }

        return response()->json([
            'total' => $total,
        ]);

    }
}
