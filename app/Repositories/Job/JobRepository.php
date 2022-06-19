<?php

namespace App\Repositories\Job;

use App\Models\Country;
use App\Models\Field;
use App\Models\Language;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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

        return view('employer.job.index', compact('step', 'countries', 'languages', 'fields'));
    }


}
