<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
{
    try {
        $google_user = Socialite::driver('google')->user();

        $user = User::where('google_id', $google_user->getId())->first();

        if (!$user) {
            $user = User::where('email', $google_user->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);
            } else {
                $user->google_id = $google_user->getId();
                $user->save();
            }
        }

        Auth::login($user);

        return redirect()->intended('/');
    } catch (\Throwable $th) {
        dd('Error signing in: ' . $th->getMessage());
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
