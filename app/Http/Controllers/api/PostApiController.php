<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return $posts;
    }
}
