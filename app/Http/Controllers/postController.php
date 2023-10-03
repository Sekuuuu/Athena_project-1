<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class postController extends Controller
{

    public function posts()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', "=", Session::get('loginId'))->first();
        }
        return view('profile.createPost', ['data' => $data]);
    }

    //for post creation
    public function create_post(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                // Add the image rule here
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Create a new post
            $post = new Post();
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $post->created_by = $data->id;
            $post->name = $data->name;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->like = 0;

            // Image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images/posts');
                $post->image = str_replace('public/', '', $imagePath);
            }

            $post->save();

            // Redirect to dashboard
            return redirect()->back()->with('success', 'Post created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}