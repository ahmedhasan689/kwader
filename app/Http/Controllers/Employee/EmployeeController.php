<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Repositories\Employee\EmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

    protected $employee;

    public function __construct(EmployeeInterface $employee)
    {
        $this->employee = $employee;
    }


    public function index()
    {
        return view('employee.index');
    }

    public function specialization()
    {
        return $this->employee->choiceSpecialization();
    }

    public  function getSpecialization($name)
    {
        return $this->employee->getSpecialization($name);
    }

    public function updateField(Request $request)
    {
        return $this->employee->updateField($request);
    }

    public function profileInfo()
    {
        return $this->employee->profileInfo();
    }

    public function getFlag($id)
    {
        return $this->employee->getFlag($id);
    }
}
