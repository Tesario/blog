<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Posts;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function index()
    {
        $posts = Posts::orderBy('id', 'DESC')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        $this->authorize("edit-post", $post);
        $categories = Categories::all();

        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Categories::all();

        return view('posts.create', ['categories' => $categories]);
    }

    public function store(SavePostRequest $request)
    {
        $newPost = auth()->user()->posts()->create([
            'title' => $request['title'],
            'text' => $request['text'],
            'category_id' => $request['category_id']
        ]);

        return redirect('post/' . $newPost->id);
    }

    public function update(SavePostRequest $request, $id)
    {
        $post = Posts::find($id);
        $this->authorize("edit-post", $post);

        $post->update($request->all());

        return redirect('post/' . $post->id);
    }

    public function destroy($id)
    {
        $post = Posts::find($id);
        $this->authorize("edit-post", $post);
        $post->delete();

        return redirect('/user/' . Auth::user()->id);
    }
}
