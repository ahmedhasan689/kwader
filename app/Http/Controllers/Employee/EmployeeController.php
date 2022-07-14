<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Country;
use App\Models\CurriculumVitae;
use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeLanguage;
use App\Models\EmployeeSkills;
use App\Models\Employer;
use App\Models\Field;
use App\Models\Job;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\Practical_Experience;
use App\Models\Skill;
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
        $data = [];
        $data['employee'] = Employee::where('id', $id)->first();
        $data['countries'] = Country::all();
        $data['nationalities'] = Nationality::all();
        $data['specializations'] = Specialization::all();
        $data['practical_experiences'] = Practical_Experience::where('employee_id', $data['employee']->id)->get();
        $data['educations'] = Education::where('employee_id', $data['employee']->id)->get();

        $date_of_birth = $data['employee']->date_of_birth;
        $data['day'] = Carbon::createFromFormat('m/d/Y', $data['employee']->date_of_birth);

        $data['certifications'] = Certification::where('employee_id', $data['employee']->id)->get();
        $data['fields'] = Field::all();
        $data['skills'] = Skill::all();
        $data['employee_skills'] = EmployeeSkills::all();
        $data['languages'] = Language::all();
        $data['employee_languages'] = EmployeeLanguage::all();
        $data['curriculum_vitaes'] = CurriculumVitae::where('employee_id', $data['employee']->id)->get();

        $employer = Employer::where('user_id', Auth::user()->id)->first();
        $data['jobs'] = Job::where('employer_id', $employer->id)->get();

        return view('employee.show', $data);
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

    /**
     * @param Request $request
     * @return mixed
     */
    public function setSkills(Request $request)
    {
        return $this->employee->setSkills($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function setlanguages(Request $request)
    {
        return $this->employee->setlanguages($request);
    }

    /**
     * @return \Illuminate\Http\Response|void
     */
    public function addCV(Request $request)
    {
        return $this->employee->addCV($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function changeAvatar(Request $request, $id)
    {
        return $this->employee->changeAvatar($request, $id);
    }
}
