<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $posts = Post::select("posts.*", "categories.name", "categories.id as cid")->where("categories.id", $id)->join("categories", "categories.id", "=", "posts.category_id")->orderBy("posts.created_at", "DESC")->get();
        return view("categories.index", compact("posts"));
    }
}
