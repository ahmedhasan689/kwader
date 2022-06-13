<?php

namespace App\Repositories\Employee;

use App\Models\Field;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EmployeeRepository implements EmployeeInterface
{
    public function choiceSpecialization()
    {
        return view('employee.profile.specialization');
    }

    public function getSpecialization($name)
    {
        $field = Field::where('field_name', $name)->first()->id;
        $specializations = Specialization::where('field_id', $field)->get();
        return response()->json([
            'type' => $specializations,
        ]);

    }
}
