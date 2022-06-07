<?php

namespace App\Http\Controllers\Social_Media;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $names = explode(' ', $user->getName());

        $userExisted = User::where('oauth_id', $user->id)->where('oauth_type', 'facebook')->first();

        if ($userExisted) {
            Auth::login($userExisted);

            return redirect()->intended(RouteServiceProvider::EMPLOYEE);
        } else {

            $registerUser = User::insert([
                'first_name' => $names[0],
                'last_name' => $names[1],
                'email' => $user->getEmail(),
                'password' => Hash::make('12345678'),
                'user_type' => Cookie::get('user_type'),
                'oauth_id' => $user->getId(),
                'oauth_type' => 'facebook',
            ]);

            Auth::login($registerUser);

            return redirect()->intended(RouteServiceProvider::EMPLOYEE);
        }
    }
}
