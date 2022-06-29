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

    // Edit Page
    public function edit($id);

    // Edit Personal Info
    public function editInfo(Request $request, $id);

    // Edit Salary
    public function editSalary(Request $request, $id);

    // Edit Availability
    public function editAvailability(Request $request, $id);

    // Edit Bio
    public function editBio(Request $request, $id);

    // Edit Personal Info Tap
    public function personalTap(Request $request, $id);

    // Add Practical Experience For Employee
    public function practicalExperience(Request $request);

    // Add Education For Employee
    public function education(Request $request);

}
