<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use ExcepTon;
use Illuminate\Support\Carbon;

class GoogleController extends Controller{
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback() {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $findemail = User::where('email', $user->email)->first();
            if($findemail)
            return redirect('register')->with('error', 'Maaf, Email pada akun Google anda, sudah digunakan di aplikasi ini');
        else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => Carbon::now(),
                'google_id'=> $user->id,
                'password' => encrypt('123456dummy')
            ]);
            Auth::login($newUser);
            return redirect('/home');
        }
    }
}
catch (ExcepTon $e) {
    return redirect('login')->with('error','Mohon maaf, kami sedang memperbaiki aplikasi agar sesuai dengan kebijakan Google');
    }
}
// public function redirectToTwitter() {
//     return Socialite::driver('twitter')->redirect();
// }
// public function handleTwitterCallback() {
//     try {
//         $user = Socialite::driver('twitter')->user();
//         $finduser = User::where('twitter_id', $user->id)->first();
//         if($finduser){
//             Auth::login($finduser);
//             return redirect('/home');
//     }else{
//         $newUser = User::create([
//             'name' => $user->name,
//             'email' => $user->nickname,
//             'email_verified_at' => Carbon::now(),
//             'twitter_id'=> $user->id,
//             'password' => encrypt('123456dummy')
//         ]);
//             Auth::login($newUser);
//             return redirect('/home');
//         }
//     } catch (ExcepTon $e) {
//         return redirect('login')->with('error','Mohon maaf, kami sedang memperbaiki aplikasi agar sesuai dengan kebijakan Twitter');
//     }
// }
}
