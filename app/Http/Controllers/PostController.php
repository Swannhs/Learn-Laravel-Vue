<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $response = array();

        $response['status'] = 'success';
        $response['total'] = Post::paginate($request->input('items'))->count();

        $data = array();

        foreach (Post::with('user', 'comment', 'vote')->paginate($request->input('items'), '*', 2) as $post) {
            $item = array();

            $author = array();
            $author['id'] = $post->user->id;
            $author['name'] = $post->user->name;

            $item['id'] = $post->id;
            $item['author'] = $author;
            $item['title'] = $post->title;
            $item['slug'] = $post->slug;
            $item['comments'] = count($post->comment);
            $item['vote'] = $post->vote;

            array_push($data, $item);
        }

        $response['data'] = $data;

        return $response;
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        Log::debug('PostController::show()');
        Log::debug(auth()->user());
        $response = array();

        $response['status'] = 'success';
        $response['data'] = Post::where('slug', $slug)
            ->with('user', 'comment', 'vote')
            ->first();
        return $response;
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
