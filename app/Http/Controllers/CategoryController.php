<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Categories as ModelsCategories;
use App\Models\Posts;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::where('category_id', $id)->get();

        $category = Categories::findOrFail($id);
        $categories = Categories::all();

        return view("posts.index", ["posts" => $posts, 'categories' => $categories]);
    }
}
