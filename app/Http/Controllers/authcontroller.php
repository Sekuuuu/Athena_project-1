<?php

namespace App\Http\Controllers;

use App\Models\post;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


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

    // For user registration validation
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


    // For login
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
                return redirect('dashboard');
            } else {
                return back()->with('fail', "Password doesn't match");
            }
        } else {
            return back()->with('fail', 'Email not registered');
        }

    }

    public function Userdashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', "=", Session::get('loginId'))->first();
            $date = Carbon::parse($data->created_at)->format('d F Y');
            $post = post::all();
            $post = $post->shuffle();

        }
        return view('dashboard', ['data' => $data, 'post' => $post, 'date' => $date]);
    }


    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}