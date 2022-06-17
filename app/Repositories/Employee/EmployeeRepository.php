<?php

namespace App\Repositories\Employee;

use App\Models\Country;
use App\Models\Employee;
use App\Models\Field;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class EmployeeRepository implements EmployeeInterface
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function choiceSpecialization()
    {
        return view('employee.profile.specialization');
    }

    /**
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSpecialization($name)
    {
        $field = Field::where('field_name', $name)->first()->id;
        $specializations = Specialization::where('field_id', $field)->get();
        return response()->json([
            'type' => $specializations,
        ]);

    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateField($request)
    {
        $field = Field::where('field_name', $request->field_name)->first()->id;

        $specialization = [];

        foreach ($request->except('field_name', '_token') as $key => $value){
            $specialization[] = $value;
        }


        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $employee->update([
            'field_id' => $field,
            'specialization' => $specialization,
        ]);

        toastr()->success('تم أختيار المجال بنجاح');

        return redirect()->route('profile.profileInfo');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profileInfo()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $countries = Country::all();

        return view('employee.profile.profile_info', compact('employee', 'countries'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFlag($id)
    {
        $flags= Country::where('id', $id)->pluck('code', 'id');
        return $flags;
    }
}
