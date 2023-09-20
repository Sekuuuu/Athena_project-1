<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class authcontroller extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:14'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if ($result) {
            return back()->with('success', 'Registered Sucessfully');
        } else {
            return back()->with('fail', 'Something went wrong.');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('Userdashboard');
            } else {
                return back()->with('fail', "Password doesn't match");
            }
        } else {
            return back()->with('fail', 'Email not registered');
        }

    }
}