<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Post[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
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

        $response['results'] = $data;

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
