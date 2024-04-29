<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select("posts.*", "categories.name")->join("categories", "categories.id", "=", "posts.category_id")->orderBy("posts.created_at", "DESC")->paginate(4);
        return view("posts.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required",
            'category' => "required",
            'content' => "required",
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Post::create([
            "title" => $request->title,
            "category_id" => $request->category,
            "image" => $imageName,
            "content" => $request->content,
        ]);

        return redirect()->back()->with("success", "Successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::select("posts.*", "categories.name")->where("posts.id", "=", $id)->join("categories", "categories.id", "=", "posts.category_id")->first();

        $posts = Post::select("posts.*", "categories.name")->join("categories", "categories.id", "=", "posts.category_id")->orderBy("posts.created_at", "DESC")->limit(7)->get();

        $categories = Category::all();

        Post::where('id', $id)->increment('view');

        return view("posts.single_post", compact('post', 'posts', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view("posts.edit", compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);


        $content = "";
        if (!empty($request->content)) {
            $content = $request->content;
        }

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            Post::where("id", $request->post_id)->update([
                'title' => $request->title,
                "image" => $imageName,
                "content" => $content
            ]);
        } else {
            Post::where("id", $request->post_id)->update([
                'title' => $request->title,
                "content" => $content
            ]);
        }

        return redirect()->back()->with('success', "Successfully edited!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where("id", $id)->delete();
        return redirect()->route("index");
    }
}
