<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{

    /**
     * Pāradresācija uz Laravel Socialite OAuth pakalpojumu sniedzēju.
     */
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Funkcija callbackGoogle, kas savieno lietotāju ar sistēmu, pieslēdzoties tai izmantojot Laravel Socialite Google pierakstīšanos.
     * Funkcija veidota ar YouTube/Takneeki Code palīdzību.
     *
     */

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $user = User::where('email', $google_user->getEmail())->first();
                
                //pirmreizējam pierakstam
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
            dd('Kļūda pievenojoties: ' . $th->getMessage());
        }
    }

    //Funkcija izrakstīšanai no sistēmas un pāradresācija uz galveno skatu
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
