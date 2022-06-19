<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Repositories\Employee\EmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

    protected $employee;

    public function __construct(EmployeeInterface $employee)
    {
        $this->employee = $employee;
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        return view('employee.index', compact('employee'));
    }

    /**
     * @return mixed
     */
    public function specialization()
    {
        return $this->employee->choiceSpecialization();
    }

    /**
     * @param $name
     * @return mixed
     */
    public  function getSpecialization($name)
    {
        return $this->employee->getSpecialization($name);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateField(Request $request)
    {
        return $this->employee->updateField($request);
    }

    /**
     * @return mixed
     */
    public function profileInfo()
    {
        return $this->employee->profileInfo();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFlag($id)
    {
        return $this->employee->getFlag($id);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function setInformation(Request $request)
    {
        return $this->employee->setInformation($request);
    }
}
