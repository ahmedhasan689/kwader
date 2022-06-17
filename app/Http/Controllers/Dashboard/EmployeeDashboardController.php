<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Language;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        // Users Type Is => ( Employee )
        $users = User::with('employee')->where('user_type', 'Employee')->paginate(2);

        return view('Dashboard.employee.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $languages = Language::all();

        return view('Dashboard.employee.create', compact('countries', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'min:1', 'max:50'],
            'last_name' => ['required', 'min:1', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:50'],
            'password_confirmation' => ['required'],
            'phone_number' => ['required', 'numeric'],

            'country_id' => ['required'],
            'language_id' => ['required'],
            'gender' => ['required', 'in:Male,Female'],
            'date_of_birth' => ['nullable'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,svg'],

        ]);

        if ($request->password === $request->password_confirmation) {

            if ($request->hasFile('avatar')){
                $file = $request->file('avatar');

                $image_path = $file->store('/', [
                    'disk' => 'user_avatar',
                ]);
            }

            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'last_seen' => Carbon::now(),
            ]);

            Employee::create([
                'user_id' => User::latest()->first()->id,
                'country_id' => $request->country_id,
                'language_id' => $request->language_id,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'avatar' => $image_path,
            ]);

            toastr()->success('تم إنشاء الكادر بنجاح');

            return redirect()->route('admin.employee.index');

        }else{
            toastr()->error('كلمات المرور غير متطابقة');

            return redirect()->route('admin.employee.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $countries = Country::all();
        $languages = Language::all();

        return view('Dashboard.employee.edit', compact('user','countries', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $employee = Employee::where('user_id', $user->id)->first();


        $request->validate([
            'first_name' => ['nullable', 'min:1', 'max:50'],
            'last_name' => ['nullable', 'min:1', 'max:50'],
            'email' => ['nullable', 'email'],
            'password' => ['nullable', 'min:8', 'max:250'],
            'password_confirmation' => ['nullable'],
            'phone_number' => ['nullable', 'numeric'],

            'country_id' => ['nullable'],
            'language_id' => ['nullable'],
            'gender' => ['nullable', 'in:Male,Female'],
            'date_of_birth' => ['nullable'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,svg'],

        ]);


        if (!empty($request->password)) {
            if ($request->password === $request->password_confirmation) {
                $new_password = Hash::make($request->password);
            }else{
                toastr()->error('كلمات المرور غير متطابقة');

                return redirect()->route('admin.employee.edit');
            }
        }else{
            $new_password = $user->password;
        }

        $image = $employee->avatar;

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $image_path = $file->store('/', [
                'disk' => 'user_avatar',
            ]);

            $image = $image_path;
        }else{
            $image = $employee->avatar;
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $new_password,
            'phone_number' => $request->phone_number,
            'last_seen' => Carbon::now(),
        ]);

        $employee->update([
            'country_id' => $request->country_id,
            'language_id' => $request->language_id,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'avatar' => $image,
        ]);

        toastr()->success('تم تعديل الكادر بنجاح');

        return redirect()->route('admin.employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'remaining_days' => '30',
        ]);

        if ($user) {
            $user->update([
                'remaining_days' => '30',
            ]);

            Storage::disk('user_avatar')->delete($user->employee->avatar);
//            unlink(public_path('user_avatar/' . $user->employee->avatar));

            $user->delete();
        }

        toastr()->error('تم حذف المستخدم بنجاح');

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function trash()
    {
        $users = User::where('user_type', 'Employee')->onlyTrashed()->paginate(5);

        return view('Dashboard.employee.trash', compact('users', ));
    }

    /**
     * Restore Employee
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request, $id = null)
    {
        if($id) {
            $employee = User::onlyTrashed()->findOrFail($id);

            $employee->restore();

            $employee->update([
               'remaining_days' => null
            ]);

            toastr()->success('تم إستعادة الكادر بنجاح');

            return redirect()->route('admin.employee.index');
        }

        $employees = User::where('user_type', 'Employee')->onlyTrashed()->get();
        foreach ($employees as $employee) {
            $employee->restore();
            $employee->update([
                'remaining_days' => null
            ]);
        }


        toastr()->success('تم إستعادة كافة الكوادر بنجاح');

        return redirect()->route('admin.employee.index');
    }

    public function forceDelete($id = null)
    {
        if($id) {
            $user = User::onlyTrashed()->findOrFail($id);

            $employee = Employee::where('user_id', $user->id)->delete();

            $user->forceDelete();

            toastr()->success('تم حذف الكادر بنجاح');

            return redirect()->route('admin.employee.index');
        }

        $users = User::where('user_type', 'Employee')->onlyTrashed()->get();
        foreach ($users as $user) {
            $employee = Employee::where('user_id', $user->id)->forceDelete();
            $user->forceDelete();
        }

        toastr()->success('تم حذف كافة الكوادر بنجاح');

        return redirect()->route('admin.employee.index');
    }
}
