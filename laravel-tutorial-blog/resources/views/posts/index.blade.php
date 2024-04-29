@extends('layouts.myapp')
@section('title', "My Blog")
@section('content')

      <!-- ======= Post Grid Section ======= -->
      <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
              <div class="row">
                    @foreach ($posts as $item)
                  <div class="col-md-3">
                    <div class="post-entry-1">
                        <a href="{{ route("post.show", ['id'=>$item->id]) }}"><img src="{{ asset("images/".$item->image) }}" alt="" style="height: 200px!important; width:200px!important;" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">{{ $item->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("m.d.Y", strtotime($item->created_at)) }}</span></div>
                        <h2><a href="{{ route("post.show", ['id'=>$item->id]) }}">{{ $item->title }}</a></h2>
                    </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
          </div> <!-- End .row -->
        </div>
      </section> <!-- End Post Grid Section -->


@endsection
