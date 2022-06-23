<?php

namespace App\Repositories\Job;

interface JobInterface
{
    // Show Create Page - By Default Step = 1
    public function create($step);

    // Store Job In DB - Step = 2
    public function store($request, $step);

    // Store Job In DB - Step = 3
    public function payingOff($step);

}
