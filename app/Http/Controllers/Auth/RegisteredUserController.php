<?php

namespace App\Http\Controllers\Auth;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Home.index');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($validator->passes()) {

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'user_type' => Cookie::get('user_type'),
                'password' => Hash::make($request->password),
            ]);

            if (Cookie::get('user_type') == 'Employer'){
                Employer::create([
                    'user_id' => User::latest()->first()->id,
                ]);
            }elseif(Cookie::get('user_type') == 'Employee'){
                Employee::create([
                    'user_id' => User::latest()->first()->id,
                ]);
            }

            event(new Registered($user));

            Auth::login($user);

            return response()->json([
                'user' => Auth::user()
            ]);
        }


    }


}
