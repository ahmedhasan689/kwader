<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Repositories\Employer_Settings\EmployerSettingsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerSettingsController extends Controller
{
    /**
     * @var EmployerSettingsInterface;
     */
    protected $settings;

    public function __construct(EmployerSettingsInterface $settings)
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

    public function notificationSystem(Request $request)
    {
        return $this->settings->notificationSystem($request);
    }

}
