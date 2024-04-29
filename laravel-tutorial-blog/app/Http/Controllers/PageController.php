<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        $post = Post::select("posts.*", "categories.name")->where("posts.id", "=", 3)->join("categories", "categories.id", "=", "posts.category_id")->first();

        $posts = Post::select("posts.*", "categories.name")->join("categories", "categories.id", "=", "posts.category_id")->orderBy("posts.created_at", "DESC")->limit(7)->get();

        $randomPostsOne = Post::select("posts.*", "categories.name")->join("categories", "categories.id", "=", "posts.category_id")->inRandomOrder()->take(3)->get();
        $randomPostsTwo = Post::select("posts.*", "categories.name")->join("categories", "categories.id", "=", "posts.category_id")->inRandomOrder()->take(3)->get();
        return view("index", compact("post", "posts", "randomPostsOne", "randomPostsTwo"));
    }

    public function integrated()
    {
        $data = Http::post("http://laraveltutsblog/api/data/get");
        $data = json_decode($data, true);
        return view('integrated', compact("data"));
    }
}
