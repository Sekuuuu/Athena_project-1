<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class profileController extends Controller
{
    public function profile()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', "=", Session::get('loginId'))->first();
            $date = Carbon::parse($data->created_at)->format('d F Y');

            // Retrieve posts created by the logged-in user
            $posts = Post::where('created_by', '=', Session::get('loginId'))
                ->with('user:id,name', 'comments.replies', 'comments.user:id,name', 'comments.replies.user:id,name')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('profile.profile', ['data' => $data, 'post' => $posts, 'date' => $date]);
        }
        // Handle the case where the user is not logged in
        // ...
    }



}