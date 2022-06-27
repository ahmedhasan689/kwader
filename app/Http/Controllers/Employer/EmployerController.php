<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployerController extends Controller
{

    /*protected $user;

    public function __construct(User $user)
    {
        $user = User::latest('id')->first();
        $this->user = $user;
    }*/

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id = null)
    {
        return view('employer.index');
    }

    /**
     * @param $type
     * @return JsonResponse
     */
    public function accountType($type)
    {
        if ( Cookie::get('user_type') ) {
            Cookie::queue('user_type', ' ', -60);

            Cookie::queue('user_type', $type, 10);
        }else{
            Cookie::queue('user_type', $type, 10);
        };

        return response()->json([
            'name' => Cookie::get('user_type'),
        ]);
    }
}
