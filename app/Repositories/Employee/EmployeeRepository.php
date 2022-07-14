<?php

namespace App\Repositories\Employee;

use App\Models\Certification;
use App\Models\Country;
use App\Models\CurriculumVitae;
use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeLanguage;
use App\Models\EmployeeSkills;
use App\Models\Field;
use App\Models\Language;
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
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;
use Illuminate\Support\Str;

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
        $data = [];

        $data['employee'] = Employee::where('user_id', Auth::user()->id)->first();
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

        return view('employee.edit',  $data);

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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function practicalExperience(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => ['required', 'string', 'max:255'],
            'special' => ['required'],
            'company_name' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'string', 'max:255'],
            'start_month' => ['required'],
            'start_year' => ['required'],
            'end_month' => ['nullable'],
            'end_year' => ['nullable'],
            'description' => ['required', 'min:20', 'max:500'],
        ]);

        if ($validator->passes()) {
            Practical_Experience::create([
                'job_title' => $request->job_title,
                'employee_id' => Employee::where('user_id', Auth::user()->id)->first()->id,
                'country_id' => $request->country_id,
                'company_name' => $request->company_name,
                'specializations' => $request->special,
                'start_date' => $request->start_month . ' / ' . $request->start_year,
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

    /**
     * @param $request
     * @return RedirectResponse|void
     */
    public function education($request)
    {
        $validator = Validator::make($request->all(), [
            'enterprise_name' => ['required', 'string', 'max:255'],
            'special' => ['required'],
            'diploma_name' => ['required', 'string', 'max:255'],
            'edu_start_month' => ['required'],
            'edu_start_year' => ['required'],
            'edu_end_month' => ['nullable'],
            'edu_end_year' => ['nullable'],
            'description' => ['required', 'min:20', 'max:500'],
            'certification_url' => ['nullable', 'url'],
            'certification_file' => ['nullable']
        ]);

        if ($validator->passes()) {

            $file_path = null;
            if ($request->hasFile('cert_file')) {
                $file = $request->file('cert_file');

                $file_path = $file->store('/', [
                    'disk' => 'attachments'
                ]);

            }
            if( $request->edu_end_month == 'الشهر' || $request->edu_end_year == 'السنة') {
                $request->edu_end_month = null;
                $request->edu_end_year= null;
            }
            Education::create([
                'enterprise_name' => $request->enterprise_name,
                'diploma_name' => $request->diploma_name,
                'employee_id' => Employee::where('user_id', Auth::user()->id)->first()->id,
                'specializations' => $request->special,
                'start_date' => $request->edu_start_month . ' / ' . $request->edu_start_year,
                'end_date' => $request->edu_end_month . ' / ' . $request->edu_end_year,
                'description' => $request->description,
                'certification_url' => $request->cert_url,
                'certification_file' => $file_path,
            ]);

            toastr()->success('تم التعديل');

            return redirect()->back();
        }elseif($validator->fails()){
            toastr()->error('لم يتم حفظ البيانات ، يرجى التأكد');

            return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * @param $request
     * @return RedirectResponse|void
     */
    public function certification($request)
    {
        $validator = Validator::make($request->all(), [
            'center_name' => ['required', 'string', 'max:255'],
            'certification_name' => ['required', 'string', 'max:255'],
            'special' => ['required'],
            'start_month' => ['required'],
            'start_year' => ['required'],
            'end_month' => ['nullable'],
            'end_year' => ['nullable'],
            'certification_url' => ['nullable', 'url'],
            'certification_file' => ['nullable']
        ]);

        if ($validator->passes()) {

            $file_path = null;
            if ($request->hasFile('certification_file')) {
                $file = $request->file('certification_file');

                $file_path = $file->store('/', [
                    'disk' => 'attachments'
                ]);

            }
            if( $request->end_month == 'الشهر' || $request->end_year == 'السنة') {
                $request->end_month = null;
                $request->end_year= null;
            }
            Certification::create([
                'center_name' => $request->center_name,
                'name' => $request->certification_name,
                'employee_id' => Employee::where('user_id', Auth::user()->id)->first()->id,
                'specializations' => $request->special,
                'start_date' => $request->start_month . ' / ' . $request->start_year,
                'end_date' => $request->end_month . ' / ' . $request->end_year,
                'certification_url' => $request->certification_url,
                'certification_file' => $file_path,
            ]);

            toastr()->success('تمت الإضافة');

            return redirect()->back();
        }elseif($validator->fails()){
            toastr()->error('لم يتم حفظ البيانات ، يرجى التأكد');

            return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function setSkills(Request $request)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $validator = Validator::make($request->all(), [
            'specializations' => ['required'],
            'skills' => ['required'],
            'description' => ['required', 'min:5', 'max:250'],
        ]);

        if ($validator->passes()) {
            EmployeeSkills::create([
                'employee_id' =>  $employee->id,
                'specialization_id' => $request->specializations,
                'skills' => $request->skills,
                'description' => $request->description
            ]);

            toastr()->success('تمت الإضافة');
            return response()->json([
                'success' => 'Done',
            ]);
        }elseif($validator->fails()){
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setlanguages(Request $request)
    {
        $request->validate([
            'language_id' => ['required'],
            'level' => ['required'],
        ]);

        EmployeeLanguage::create([
            'employee_id' => Employee::where('user_id', Auth::user()->id)->first()->id,
            'language_id' => $request->language_id,
            'level' => $request->level,
        ]);

        toastr()->success('تمت الإضافة');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function addCV(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'cv_file' => ['required']
        ]);

        if($validator->passes()) {

//            $file_path = null;

            if ( $request->hasFile('cv_file') ) {
                $file = $request->file('cv_file');

                $file_path = $file->store('/', [
                    'disk' => 'employee_cv',
                ]);
            }

            CurriculumVitae::create([
                'id' => Str::uuid(),
                'employee_id' => Employee::where('user_id', Auth::user()->id)->first()->id,
                'cv' => $file_path,
            ]);

            toastr()->success('تمت إضافة السيرة الذاتية إلى ملفك بنجاح');

            return redirect()->back();
        }elseif($validator->fails()) {
            return redirect()->back()->withErrors('يوجد في ملفك سيرة ذاتية بالفعل !');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function changeAvatar(Request $request, $id)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $image_path = null;

        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $image_path = $file->store('/', [
                'disk' => 'user_avatar'
            ]);
        }

        $employee->update([
            'avatar' => $image_path,
        ]);

        toastr()->success('تم تحديث صورتك الشخصية بنجاح');

        return redirect()->back();
    }
}
