<?php

namespace App\Repositories\Job;

use Illuminate\Http\Request;

interface JobInterface
{
    // Jobs Page
    public function allJobs();

    // Show Create Page - By Default Step = 1
    public function create($step);

    // Store Job In DB - Step = 2
    public function store($request, $step);

    // Store Job In DB - Step = 3
    public function payingOff($step);

    // Search
    public function search(Request $request);

    // Show Job
    public function show($id);

    // Update Job For Employee Applicants
    public function update(Request $request, $id);

}
