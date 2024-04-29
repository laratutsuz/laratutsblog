@extends('layouts.myapp')
@section('title', "My Blog")
@section('content')
<section id="contact" class="contact mb-5">
    <div class="container" data-aos="fade-up">

     <di class="row">
        @foreach ($data as $item)
            <div class="col-md-3 mt-4">
                <div class="card" style="width: 18rem; height: 150px;">
                    <div class="card-body">
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ date("m.d.Y", strtotime($item['created_at'])) }}</h6>
                    <p class="card-text">{{ $item['content'] }}</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link"><i class="bi bi-eye"></i> {{ $item['view'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
     </di>

    </div>
  </section>
@endsection
