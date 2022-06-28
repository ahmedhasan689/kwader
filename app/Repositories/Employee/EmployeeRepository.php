<?php

namespace App\Repositories\Employee;

use App\Models\Country;
use App\Models\Employee;
use App\Models\Field;
use App\Models\Nationality;
use App\Models\Practical_Experience;
use App\Models\Skill;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class EmployeeRepository implements EmployeeInterface
{
    /**
     * @return Application|Factory|View
     */
    public function choiceSpecialization()
    {
        return view('employee.profile.specialization');
    }

    /**
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSpecializationByName($name)
    {
        $field = Field::where('field_name', $name)->first()->id;
        $specializations = Specialization::where('field_id', $field)->get();
        return response()->json([
            'type' => $specializations,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSpecializationById($id)
    {
        $field = Field::where('id', $id)->first();
        $specializations = Specialization::where('field_id', $field->id)->get();
        return response()->json([
            'type' => $specializations,
        ]);
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function updateField($request)
    {
        $field = Field::where('field_name', $request->field_name)->first()->id;

        $specialization = [];

        foreach ($request->except('field_name', '_token') as $key => $value) {
            $specialization[] = $value;
        }


        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $employee->update([
            'field_id' => $field,
            'specialization' => $specialization,
        ]);

        toastr()->success('تم أختيار المجال بنجاح');

        return redirect()->route('profile.profileInfo');

    }

    /**
     * @return Application|Factory|View
     */
    public function profileInfo()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $countries = Country::all();

        $skills = Skill::all();

        return view('employee.profile.profile_info', compact('employee', 'countries', 'skills'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFlag($id)
    {
        $flags = Country::where('id', $id)->pluck('code', 'id');
        return $flags;
    }

    public function setInformation(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $request->validate([
            "job_title" => 'required',
            "country" => 'required',
            "years_of_experience" => 'required',
            "skills" => 'required',
            "salary" => 'required|numeric',
            "phone_number" => 'nullable|numeric',
        ]);

        $employee->update([
            "job_title" => $request->job_title,
            "country_id" => $request->country,
            "years_of_experience" => $request->years_of_experience,
            "skills" => $request->skills,
            "salary" => $request->salary,
        ]);

        $user->update([
            'phone_number' => $request->phone_number,
        ]);
        toastr()->success('تم حفظ بياناتك بنجاح');

        return redirect()->route('employee.dashboard.index');

    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $countries = Country::all();
        $nationalities = Nationality::all();
        $specializations = Specialization::all();
        $practical_experiences = Practical_Experience::where('employee_id', $employee->id)->get();

        $date_of_birth = $employee->date_of_birth;
        $day = Carbon::createFromFormat('m/d/Y', $employee->date_of_birth);

        return view('employee.edit', compact('employee', 'countries', 'nationalities', 'day', 'specializations', 'practical_experiences'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function editInfo($request, $id)
    {
        $employee = Employee::where('id', $id)->findOrFail($id);
        $user = User::where('id', $employee->user_id)->first();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'job_title' => 'required',
            'country_id' => 'required',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
        $employee->update([
            'job_title' => $request->job_title,
            'country_id' => $request->country_id
        ]);

        toastr()->success('تم تعديل بياناتك بنجاح');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function editSalary(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->findOrFail($id);

        $request->validate([
            'salary' => 'required',
            'years_of_experience' => 'required',
        ]);

        $employee->update([
            'salary' => $request->salary,
            'years_of_experience' => $request->years_of_experience,
        ]);

        toastr()->success('تم تعديل بياناتك بنجاح');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function editAvailability(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->findOrFail($id);

        $employee->update([
            'job_type' => $request->job_type,
            'availability' => $request->availability,
        ]);

        toastr()->success('تم تعديل بياناتك بنجاح');

        return redirect()->back();
    }

    public function editBio(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->findOrFail($id);

        $request->validate([
            'bio' => 'required|min:15|max:500',
        ]);

        $employee->update([
            'bio' => $request->bio,
        ]);

        toastr()->success('تم تعديل بياناتك بنجاح');

        return redirect()->back();
    }

    public function personalTap(Request $request, $id)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->findOrFail($id);

        $user = User::where('id', $employee->user_id)->first();
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->passes()) {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);
            $employee->update([
                'date_of_birth' => $request->month . '/' . $request->day . '/' . $request->year,
                'nationality_id' => $request->nationality,
                'gender' => $request->gender,
                'country_id' => $request->country,
                'marital_status' => $request->marital_status,
            ]);
            toastr()->success('تم التعديل');
            return response()->json([
                'success' => 'Done',
            ]);
        }elseif($validator->fails()){
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }

    }

    public function practicalExperience(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => ['required', 'string', 'max:255'],
            'special' => ['required'],
            'company_name' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'string', 'max:255'],
            'start_month' => ['required'],
            'start_year' => ['required'],
            'end_month' => ['required'],
            'end_year' => ['required'],
            'description' => ['required', 'min:20', 'max:500'],
        ]);

        if ($validator->passes()) {
            Practical_Experience::create([
                'job_title' => $request->job_title,
                'employee_id' => Employee::where('user_id', Auth::user()->id)->first()->id,
                'country_id' => $request->country_id,
                'company_name' => $request->company_name,
                'specializations' => $request->special,
                'start_date' => $request->start_month . '/' . $request->start_year,
                'end_date' => $request->end_month . '/' . $request->end_year,
                'description' => $request->description,
            ]);

            toastr()->success('تم التعديل');
            return response()->json([
                'success' => 'Done',
            ]);
        }elseif($validator->fails()){
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }

    }
}
