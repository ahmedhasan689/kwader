<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Nationality;
use App\Models\Practical_Experience;
use App\Models\Specialization;
use App\Repositories\Employee\EmployeeInterface;
use Carbon\Carbon;
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
    public function index($id = null)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        return view('employee.index', compact('employee'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $employee = Employee::where('id', $id)->first();
        $countries = Country::all();
        $nationalities = Nationality::all();
        $specializations = Specialization::all();
        $practical_experiences = Practical_Experience::where('employee_id', $employee->id)->get();
        $educations = Education::where('employee_id', $employee->id)->get();

        $date_of_birth = $employee->date_of_birth;
        $day = Carbon::createFromFormat('m/d/Y', $employee->date_of_birth);

        return view('employee.show', compact( 'employee', 'countries', 'nationalities', 'specializations', 'practical_experiences', 'educations', 'day' ));
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
    public  function getSpecializationByName($name)
    {
        return $this->employee->getSpecializationByName($name);
    }

    public  function getSpecializationById($id)
    {
        return $this->employee->getSpecializationById($id);
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

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->employee->edit($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function editInfo(Request $request, $id)
    {
        return $this->employee->editInfo($request, $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function editSalary(Request $request, $id)
    {
        return $this->employee->editSalary($request, $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function editAvailability(Request $request, $id)
    {
        return $this->employee->editAvailability($request, $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function editBio(Request $request, $id)
    {
        return $this->employee->editBio($request, $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function personalTap(Request $request, $id)
    {
        return $this->employee->personalTap($request, $id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function practicalExperience(Request $request)
    {
        return $this->employee->practicalExperience($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function education(Request $request)
    {
        return $this->employee->education($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function certification(Request $request)
    {
        return $this->employee->certification($request);
    }
}
