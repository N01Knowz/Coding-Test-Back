<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StoreRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::select('posts.*', 'users.name')->join('users', 'posts.user_id', 'users.id')->orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $todo = new Posts();
        $todo->user_id = Auth::user()->id;
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->save();

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Posts::select('posts.*', 'users.name')->join('users', 'posts.user_id', 'users.id')->orderBy('created_at', 'desc')->where("posts.id", $id)->first();
        return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
