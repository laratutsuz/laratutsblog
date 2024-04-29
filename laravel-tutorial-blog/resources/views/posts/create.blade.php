@extends('layouts.myapp')
@section('title', "My Blog")
@section('content')
<section id="contact" class="contact mb-5">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">Create a post</h1>
        </div>
      </div>

      <div class="form mt-5">
        <form action="{{ route("post.store") }}" method="post" class="p-3 border rounded shadow bg-white" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="title" class="form-control" id="name" placeholder="Post title" required>
            </div>
            <div class="form-group col-md-6">
              <select name="category" class="form-control">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group my-3">
            <input type="file" class="form-control" name="image" placeholder="Image" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="content" rows="5" placeholder="Write your content" required></textarea>
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
