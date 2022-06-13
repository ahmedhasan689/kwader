<?php

namespace App\Repositories\Employee;

use Illuminate\Http\Request;

interface EmployeeInterface {

    // Choice Specialization After Register
    public function choiceSpecialization();
    public function getSpecialization($name);









}
