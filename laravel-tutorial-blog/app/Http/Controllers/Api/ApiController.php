<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function storeData(Request $request)
    {
        $data = $request->validate([
            "title" => "required",
            "category_id" => "required",
            "content" => "required",
        ]);

        $data['image'] = "1714307944.jpg";

        $d = Post::create($data);

        return $d;
    }

    public function getData()
    {
        $posts = Post::select("posts.*", "categories.name as category_name")->join("categories", "categories.id", "=", "posts.category_id")->get();
        return $posts;
    }

    public function getDataOne($id)
    {
        $post = Post::select("posts.*", "categories.name as category_name")
        ->where("posts.id", $id)
        ->join("categories", "categories.id", "=", "posts.category_id")
        ->first();

        return $post;
    }
}
