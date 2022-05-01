<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostIndexResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return PostIndexResource::collection(Post::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $comments = User::find($id)->posts;
        return PostIndexResource::collection($comments);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
