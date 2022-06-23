<?php

namespace App\Repositories\Employee;

use Illuminate\Http\Request;

interface EmployeeInterface {

    // Choice Specialization After Register
    public function choiceSpecialization();

    // Get Specialization By Name
    public function getSpecializationByName($name);

    // Get Specialization By Id
    public function getSpecializationById($id);

    // Update Field And Specialization
    public function updateField(Request $request);

    // Profile Info [ Step 2 Before Profile ]
    public function profileInfo();

    // Get Country Flag
    public function getFlag($id);

    // Set Information For Employee
    public function setInformation(Request $request);





}
