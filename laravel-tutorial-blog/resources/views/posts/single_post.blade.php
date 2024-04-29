@extends('layouts.myapp')
@section('title', "My Blog")
@section('content')
<section id="contact" class="contact mb-5">
    <section class="single-post-content">
        <div class="container">
            <a href="{{ route("post.edit", ['id'=>$post->id]) }}" class="btn btn-success">Update</a>
            <a href="{{ route("post.destroy", ['id'=>$post->id]) }}" class="btn btn-danger">Delete</a>
          <div class="row">
            <div class="col-md-9 post-content" data-aos="fade-up">

              <!-- ======= Single Post Content ======= -->
              <div class="single-post">
                <img src="{{ asset("images/".$post->image) }}" class="img-fluid text-center mx-auto" alt="">
                <div class="post-meta"><span class="date">{{ $post->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("d.m.Y", strtotime($post->created_at)) }}</span> <span><i class="bi bi-eye"></i> {{ $post->view }} </span></div>
                <h1 class="mb-5">{{ $post->title }}</h1>
                {!! $post->content !!}
                </div><!-- End Single Post Content -->

            </div>
            <div class="col-md-3">
              <!-- ======= Sidebar ======= -->
              <div class="aside-block">

                <div class="tab-content" id="pills-tabContent">

                  <!-- Popular -->
                  <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                    @foreach ($posts as $item)
                    <div class="post-entry-1 border-bottom">
                      <div class="post-meta"><span class="date">{{ $item->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("m.d.Y", strtotime($item->created_at)) }}</span></div>
                      <h2 class="mb-2"><a href="{{ route("post.show", ['id'=>$item->id]) }}">{{ $item->title }}</a></h2>
                    </div>
                    @endforeach
                  </div> <!-- End Popular -->

                </div>
              </div>

              <div class="aside-block">
                <h3 class="aside-title">Categories</h3>
                <ul class="aside-links list-unstyled">
                    @foreach ($categories as $item)
                        <li><a href="{{ route("category.show", ['id'=>$item->id]) }}"><i class="bi bi-chevron-right"></i>{{ $item->name }}</a></li>
                    @endforeach
                </ul>
              </div><!-- End Categories -->

            </div>
          </div>
        </div>
      </section>
@endsection
