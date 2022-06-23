<?php

namespace App\Repositories\Job;

use App\Models\Country;
use App\Models\Employer;
use App\Models\Field;
use App\Models\Job;
use App\Models\Language;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class JobRepository implements JobInterface
{
    /**
     * @var int
     */
    public $stepNumber = 1;

    /**
     * @param $step
     * @return Application|Factory|View
     */
    public function create($step)
    {

        $this->stepNumber = $step;

        $countries = Country::all();

        $languages = Language::all();

        $fields = Field::all();

        return view('employer.job.index', compact('step', 'countries', 'languages', 'fields'));
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

        // Validation
        /*$request->validate([
            'job_title' => ['required', 'min:3', 'max:150'],
            'job_field' => ['required'],
            'special' => ['required'],
            'years_of_experience' => ['required'],
            'salary' => ['required', 'numeric'],
            'job_system' => ['required'],
            'country_id' => ['required', 'in:countries,id'],
            'languages' => ['required'],
            'job_description' => ['required', 'min:15', 'max:250'],
        ]);*/

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
        Job::create([
            'job_title' => $request->job_title,
            'description' => $request->job_description ,
            'years_of_experience' => $request->years_of_experience,
            'job_system' => $request->job_system,
            'specialization' => $list_of_specializations,
            'languages' => $list_of_languages,
            'salary' => $request->salary,
            'status' => 'Under-Review',
            'employer_id' => Employer::where('user_id', Auth::user()->id)->first()->id,
            'country_id' => $request->country_id,
            'field_id' => $request->job_field,
        ]);

        toastr()->success('تم إضافة البيانات بنجاح ، إنتظر رد الإدارة');

        return view('employer.job.index', compact('step', 'countries', 'languages', 'fields'));
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


}
