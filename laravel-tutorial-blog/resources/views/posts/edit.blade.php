@extends('layouts.myapp')
@section('title', "My Blog")
@section('content')
<section id="contact" class="contact mb-5">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">Edit a post</h1>
        </div>
      </div>

      <div class="form mt-5">
        <form action="{{ route("post.update") }}" method="post" class="p-3 border rounded shadow bg-white" enctype="multipart/form-data">
            @csrf
            @method('PUT');
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="title" class="form-control" id="name" placeholder="Post title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group col-md-6">
              <select name="category" class="form-control">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" @if($item->category_id == $post->category_id) selected @endif>{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <div class="form-group my-3">
            <div style="width: 200px; height: 200px;">
                <img src="{{ asset("images/".$post->image) }}" class="img-fluid" alt="Image">
            </div>
            <input type="file" class="form-control" name="image" placeholder="Image">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="content" rows="5" placeholder="Write your content">{{ $item->content }}</textarea>
          </div>
            @if (session()->has("success"))
            <div class="my-3">
                <div class="sent-message"> <span class="badge bg-success"> {{ session()->get("success") }} </span></div>
            </div>
            @endif
          <input type="submit" class="btn btn-primary" value="Post content"></input>
        </form>
      </div><!-- End Contact Form -->

    </div>
  </section>
@endsection
