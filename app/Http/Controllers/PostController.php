<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|editor'], ['only' => ['store']]);
        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $response = array();

        $response['status'] = 'success';
        $response['total'] = Post::paginate($request->input('items'))->count();

        $data = array();

        foreach (Post::with('user', 'comment', 'vote')->where('publish', true)->paginate($request->input('items'), '*', 2) as $post) {
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

        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'content' => 'required|string|max:255',
        ]);

        Log::debug($request->user());

//        $post = Post::create([
//            'title' => $request->title,
//            'slug' => $request->slug,
//            'content' => $request->content,
//            'user_id' => $request->user()->id,
//        ]);
    }

    public function show($slug)
    {
        $response = array();

        $post = Post::where('slug', $slug)
            ->where('publish', true)
            ->with('user', 'comment', 'vote')
            ->first();

        if ($post > 0) {
            $response['status'] = 'success';
            $response['data'] = $post;
            return response()->json($response, ResponseAlias::HTTP_OK);
        } else {
            $response['status'] = 'unavailable';
            $response['message'] = 'Post not found';
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
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
