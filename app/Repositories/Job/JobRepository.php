<?php

namespace App\Repositories\Job;

use App\Models\Country;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Field;
use App\Models\Job;
use App\Models\Language;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobRepository implements JobInterface
{
    /**
     * @var int
     */
    public $stepNumber = 1;

    public function allJobs()
    {
        $jobs = Job::where('status', 'Opened')->paginate(6);

        return view('employer.job.index', compact('jobs'));
    }

    /**
     * @param $step
     * @return Application|Factory|View
     */
    public function create($step)
    {

        $this->stepNumber = $step;

        $countries = Country::all();

        $languages = Language::all();

        $skills = Skill::all();

        $fields = Field::all();

        return view('employer.job.create', compact('step', 'countries', 'languages', 'fields', 'skills'));
    }


    /**
     * Store Job In DB - Step = 2
     * @param $request
     * @param $step
     * @return Factory|Application|View
     */
    public function store($request, $step)
    {
        $this->stepNumber = $step;

        $countries = Country::all();

        $languages = Language::all();

        $fields = Field::all();

        $skills = Skill::all();

        // Validation
        $request->validate([
            'job_title' => ['required', 'min:3', 'max:150'],
            'job_field' => ['required'],
            'special' => ['required'],
            'years_of_experience' => ['required'],
            'salary' => ['required', 'numeric'],
            'job_system' => ['required'],
            'country_id' => ['required'],
            'languages' => ['required'],
            'job_description' => ['required', 'min:15', 'max:250'],
        ]);

        // Array Of Specializations
        $list_of_specializations = [];
        foreach( $request->special as $key => $value ){
            for($i = 0; $i < count($request->special); $i++) {
                $list_of_specializations[$key] = $value;
            }
        };

        // Array Of Languages
        $list_of_languages = null;
        if ($request->languages) {
            foreach( $request->languages as $key => $value ){
                for($i = 0; $i < count($request->languages); $i++) {
                    $list_of_languages[$key] = $value;
                }
            };
        }
//

        // Array Of Skills
        $list_of_skills = null;
        if ($request->skills) {
            foreach( $request->skills as $key => $value ){
                for($i = 0; $i < count($request->skills); $i++) {
                    $list_of_skills[$key] = $value;
                }
            };
        }

        Job::create([
            'job_title' => $request->job_title,
            'slug' => $this->slug($request->job_title),
            'description' => $request->job_description ,
            'years_of_experience' => $request->years_of_experience,
            'job_system' => $request->job_system,
            'specialization' => $list_of_specializations,
            'languages' => $list_of_languages,
            'skills' => $list_of_skills,
            'salary' => $request->salary,
            'status' => 'Under-Review',
            'employer_id' => Employer::where('user_id', Auth::user()->id)->first()->id,
            'country_id' => $request->country_id,
            'field_id' => $request->job_field,
        ]);

        toastr()->success('تم إضافة البيانات بنجاح ، إنتظر رد الإدارة');

        return view('employer.job.create', compact('step', 'countries', 'languages', 'fields', 'skills'));
    }


    /**
     * @param $step
     * @return Application|Factory|View
     */
    public function payingOff($step)
    {
        $this->stepNumber = $step;

        $countries = Country::all();

        $languages = Language::all();

        $fields = Field::all();

        return view('employer.job.index', compact('step', 'countries', 'languages', 'fields'));
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $job = Job::where('slug', $slug)->first();

        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $users = [];

        if ($job->employee_applicants) {
            foreach ( $job->employee_applicants as $applicant) {
                $user = Employee::where('id', $applicant)->first();
                $users[] = $user;
            }
        }


        return view('employer.job.show', compact('job', 'employee', 'users'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $applicants = $job->employee_applicants;

        $applicants[] = Employee::where('user_id', Auth::user()->id)->first()->id;
        $job->update([
            'employee_applicants' => $applicants,
        ]);

        return response()->json([
            'id' => $job,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request)
    {
        $searchList = $request->search;

        foreach ( $searchList as $key => $value ) {
            for ($i = 0; $i < count($searchList); $i++) {
                $results = [];
            }
//
//            if ($key == 'salary'){
//                $jobs = Job::where('salary', '>=', $value)->get();
//                array_push($results, $jobs);
//            };

//            if ($key == 'years_of_experience') {
//                $jobs = Job::where('years_of_experience', '=', $value)->where('salary', '>=', $value)->get();
//                array_push($results, $jobs);
//            }


        }
        return response()->json([
            'items' => $results,
        ]);

    }



    public function slug($string, $separator = '_') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
}
