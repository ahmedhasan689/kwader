<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Repositories\Employee_Settings\EmployeeSettingsInterface;
use Illuminate\Http\Request;

class EmployeeSettingsController extends Controller
{
    /**
     * @var EmployeeSettingsInterface;
     */
    protected $settings;

    public function __construct(EmployeeSettingsInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param $id
     * @return mixed
     * Return Index Page
     */
    public function index($id)
    {
        return $this->settings->index($id);
    }

    /**
     * Set First Name & Last Name
     * @param Request $request
     * @return mixed
     */
    public function setNames(Request $request)
    {
        return $this->settings->setNames($request);
    }

    /**
     * Set Avatar
     * @param Request $request
     * @return mixed
     */
    public function setAvatar(Request $request)
    {
        return $this->settings->setAvatar($request);
    }

    /**
     * Set Personal Info
     * @param Request $request
     * @return mixed
     */
    public function setInfo(Request $request)
    {
        return $this->settings->setInfo($request);
    }

    /**
     * Update Email & Password
     * @param Request $request
     * @return mixed
     */
    public function setEmail(Request $request)
    {
        return $this->settings->setEmail($request);
    }

    /**
     * Reset Password
     * @param Request $request
     * @return mixed
     */
    public function resetPassword(Request $request)
    {
        return $this->settings->resetPassword($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function setPhoneNumber(Request $request)
    {
        return $this->settings->setPhoneNumber($request);
    }

    public function deleteAccount(Request $request)
    {
        return $this->settings->deleteAccount($request);
    }
}
