<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Exceptions\Exception as ExceptionsException;
use Exception;

class GoogleController extends Controller
{
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                $request->session()->put('loginId', $finduser->id);
                $imageUrl = $user->avatar_original;
                $finduser->profile_image = $imageUrl;
                $finduser->save();
                return redirect()->intended('dashboard');
            } else {
                User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('Sekudota2!'),
                    'profile_image' => $user->avatar_original,
                ]);
                return redirect('login')->with('success', 'Registered Sucessfully! Please login to continue');
            }
            ;

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}