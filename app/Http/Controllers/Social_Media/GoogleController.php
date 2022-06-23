<?php

namespace App\Http\Controllers\Social_Media;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    CONST GOOGLE_TYPE = 'google';

    public function redirect()
    {
        return Socialite::driver(static::GOOGLE_TYPE)->redirect();
    }

    public function callback()
    {

       try{
            $user = Socialite::driver(static::GOOGLE_TYPE)->stateless()->user();

            $names = explode(' ', $user->getName() );

            $userExisted = User::where('oauth_id', $user->id)->where('oauth_type', static::GOOGLE_TYPE)->first();

            if ( $userExisted ) {
                Auth::login($userExisted);

                return redirect()->intended(RouteServiceProvider::EMPLOYEE);
            }else{

                $registerUser = User::create([
                    'first_name' => $names[0],
                    'last_name' => $names[1],
                    'email' => $user->getEmail(),
                    'password' => Hash::make('12345678'),
                    'user_type' =>  Session::get('user_type'),
                    'oauth_id' => $user->getId(),
                    'oauth_type' => static::GOOGLE_TYPE,
                ]);

                Auth::login($registerUser);

                return redirect()->intended(RouteServiceProvider::EMPLOYEE);
            }
       }catch (\Exception $e) {
            dd($e);
       }
    }
}
