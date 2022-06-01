<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    /**
     * @var \App\Models\User;
     */
    protected $user;

    public function __construct(User $user)
    {
        $user = User::latest('id')->first();
        $this->user = $user;
    }

    public function index()
    {
        return view('employer.index');
    }

    public function accountType($type)
    {

        if ($type == 'Employer') {
            $this->user->update([
                'user_type' => 'Employer',
            ]);
            Employer::create([
                'user_id' => $this->user->id,
            ]);

            toastr()->success('تم إنشاء الحساب بنجاح');

            return redirect()->back();

        }else{
            Employee::create([
                'user_id' => $this->user->id,
            ]);

            toastr()->success('تم إنشاء الحساب بنجاح');
        }

    }
}
