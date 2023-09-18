<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);

        Todo::create([
            'title' => $request->title,
        ]);

        return redirect('/');
    }

    public function update(Todo $todo)
    {
        $todo->update(['completed' => !$todo->completed]);
        return back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }

}