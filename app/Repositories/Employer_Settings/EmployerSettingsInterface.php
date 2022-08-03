<?php

namespace App\Repositories\Employer_Settings;

use Illuminate\Http\Request;

interface EmployerSettingsInterface
{

    // Return Index View
    public function index($id);

    // Set First Name & Last Name
    public function setNames(Request $request);

    // Set Avatar
    public function setAvatar(Request $request);

    // Set Information
    public function setInfo(Request $request);

    // Set Email & Password
    public function setEmail(Request $request);

    // Reset Password
    public function resetPassword(Request $request);

    // Set Phone Number
    public function setPhoneNumber(Request $request);

    // Delete Employer Account & Insert Into Deletion Reasons
    public function deleteAccount(Request $request);

    // Set Notification System
    public function notificationSystem(Request $request);

}
