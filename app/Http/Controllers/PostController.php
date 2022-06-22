<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|editor'], ['only' => ['store']]);
        $this->middleware(['role:admin'], ['only' => ['update', 'destroy']]);
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

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        $response = array();

        if ($post) {
            $response['status'] = 'success';
            $response['message'] = 'Post created successfully';

            response()->json($response, ResponseAlias::HTTP_CREATED);
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error creating post';

            response()->json($response, ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
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
        $response = array();

        $post = Post::find($id);

        if ($post) {
            $post->publish = true;
            $post->save();

            $response['status'] = 'success';
            $response['message'] = 'Post has been published';

            response()->json($response, ResponseAlias::HTTP_OK);
        } else {
            $response['status'] = 'unavailable';
            $response['message'] = 'Post not found';

            response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $response = array();

        $post = Post::find($id);

        if ($post) {
            $post->delete();

            $response['status'] = 'success';
            $response['message'] = 'Post has been deleted';

            response()->json($response, ResponseAlias::HTTP_OK);
        } else {
            $response['status'] = 'unavailable';
            $response['message'] = 'Post not found';

            response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
    }
}
