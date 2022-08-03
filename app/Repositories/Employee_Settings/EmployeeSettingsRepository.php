<?php

namespace App\Repositories\Employee_Settings;

use App\Models\Country;
use App\Models\DeletionReasons;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Language;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeSettingsRepository implements EmployeeSettingsInterface
{

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id)
    {
        $data = [];
        $data['employee'] = Employee::where('user_id', Auth::user()->id)->first();

        $data['countries'] = Country::all();

        $data['languages'] = Language::all();

        return view('employee.settings.index', $data);
    }

    public function setNames(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $user = User::where('id', $employee->user_id)->first();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        toastr()->success('تم التعديل بنجاح');

        return redirect()->back();

    }

    /**
     * Set Avatar
     * @param Request $request
     * @return RedirectResponse
     */
    public function setAvatar(Request $request)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $image_path = null;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $image_path = $file->store('/', [
                'disk' => 'user_avatar',
            ]);

        }else{
            $image_path = null;
        }

        $employee->update([
            'avatar' => $image_path,
        ]);

        toastr()->success('تم تعديل الصورة الشخصية بنجاح');

        return redirect()->back();
    }

    /**
     * Set Personal Info
     * @param Request $request
     * @return RedirectResponse
     */
    public function setInfo(Request $request)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

//        dd($request);
        $employee->update([
            'date_of_birth' => $request->date_of_birth,
            'language_id' => $request->language_id,
            'country_id' => $request->country_id,
            'gender' => $request->gender,
        ]);

        toastr()->success('تم التعديل بنجاح');

        return redirect()->back();

    }

    /**
     * Update Email
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function setEmail(Request $request)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $user = User::where('id', $employee->user_id)->first();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ]);

        $password = $user->password;

        if (!empty($request->password)) {
            $password = Hash::make($request->password);
        }else{
            $password = $user->password;
        }

        if ($validator->passes()) {
            $user->update([
                'email' => $request->email,
                'password' => $password,
            ]);

            toastr()->success('تم التعديل بنجاح');

            return redirect()->back();

        }elseif($validator->fails()){

            toastr()->error('لم يتم التعديل يرجى المراجعة');

            return redirect()->back()->withErrors($validator);

        }
    }


    /**
     * Reset Password
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function resetPassword(Request $request)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $user = User::where('id', $employee->user_id)->first();

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:8',
            'repeat_password' => 'required',
            'old_password' => 'required',
        ]);

        $password = $user->password;

        if ($validator->passes()) { // If Validator Passes
            if (!empty($request->old_password)) { // If There Is A value In Old Password Input
                if (Hash::check( $request->old_password, $user->password )) { // If Old Password is The Same To User Password in DB
                    if ($request->new_password === $request->repeat_password) { // If New Password confirm Repeat Password
                        $password = Hash::make($request->new_password);

                        $user->update([
                            'password' => $password,
                        ]);

                        toastr()->success('تم تعديل كلمة المرور بنجاح');
                        return redirect()->back();
                    }else{
                        toastr()->error('كلمة المرور غير متطابقة مع التأكيد');
                        return redirect()->back();
                    }
                }else{
                    toastr()->error('كلمة المرور الحالية غير صحيحة');
                    return redirect()->back();
                }
            }else{
                $password = $user->password;
            };
        }elseif($validator->fails()) {
            toastr()->error('لم يتم التعديل يرجى المراجعة');

            return redirect()->back()->withErrors($validator);
        }
    }

    public function setPhoneNumber(Request $request)
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $user = User::where('id', $employee->user_id)->first();

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric|min:10',
        ]);

        if ($validator->passes()) {
            $user->update([
                'phone_number' => $request->phone_number,
            ]);

            toastr()->success('تم تعديل رقم الجوال بنجاح');

            return redirect()->back();

        }elseif ($validator->fails()) {

            toastr()->error('لم يتم التعديل، يرجى المراجعة');

            return redirect()->back()->withErrors($validator);
        }
    }

    // Delete Employer Account & Insert Into Deletion Reasons
    public function deleteAccount(Request $request)
    {
        $reasons = [];

        if($request->reason_one) {
            $reasons[] = $request->reason_one;
        }
        if($request->reason_two) {
            $reasons[] = $request->reason_two;
        }
        if($request->reason_three) {
            $reasons[] = $request->reason_three;
        }
        if($request->reason_four) {
            $reasons[] = $request->reason_four;
        }

        DeletionReasons::create([
            'user_id' => Auth::user()->id,
            'reasons' => $reasons,
            'explain' => $request->explain,
            'contact' => $request->contact,
        ]);

        $employee = Employee::where('user_id', Auth::user()->id)->delete();

        $user = User::where('id', Auth::user()->id)->delete();

        toastr()->success('تم حذف الحساب بنجاح');

        return redirect()->route('homepage');

    }
}
