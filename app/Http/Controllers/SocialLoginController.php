<?php

namespace App\Http\Controllers;

use App\Models\SocialLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;



class SocialLoginController extends Controller
{
    public function toProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    public function handleCallback($driver)
    {
        $user = Socialite::driver($driver)->user();
        $user_account = SocialLogin::where("provider",  $driver)->where('provider_id', $user->getId())->first();
        $db_user =  User::where('email', $user->getEmail())->first();

        if ($user_account) {
            Auth::login($user_account->user);
            Session::regenerate();

            return redirect()->route('home');
        }

        if ($db_user) {
            SocialLogin::create([
                'provider' => $driver,
                'provider_id' => $user->getId(),
                'user_id' => $db_user->id,
            ]);
        } else {

            $new_user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'profile_image' => $user->getAvatar(),
                'email_verified_at' => now(),
                'password' => bcrypt(rand(1000, 9999)),
            ]);

            SocialLogin::create([
                'provider' => $driver,
                'provider_id' => $user->getId(),
                'user_id' => $new_user->id,
            ]);

            $db_user = $new_user;
        }


        Auth::login($db_user, true);
        Session::regenerate();

        return redirect()->route('home');
    }
}
