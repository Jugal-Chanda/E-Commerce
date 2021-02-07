@extends('layouts.admin')
@section('style')

<style media="screen">
  .thumbnail img{
    width: 100%;
    object-fit:cover;
  }
</style>

@endsection
@section('content')

    <div class="card">
        <div class="card-header">{{ $toutorial->name }}</div>

        <div class="card-body">
          <div class="thumbnail my-2">
            <img src="{{ asset($toutorial->thumbnail) }}" alt="">
          </div>

          <hr>
          <h4 class="text-center">{{ $toutorial->name }}</h4>
          <hr>
          <div class="my-2">
            {!! $toutorial->description !!}
          </div>
          <hr>
          <h4 class="text-center">Vedios</h4>
          <hr>
          <div class="my-2 row">
            @if($toutorial->parts()->count() > 0)
              @foreach($toutorial->parts as $part)
              <div class="col-md-6">
                <iframe  type="text/html" height="200" src="https://www.youtube.com/embed/{{ $part->code }}" frameborder="0" allowfullscreen style="width: 100%;"></iframe>
                <h5>{{ $part->title }}</h5>
              </div>
              @endforeach
            @endif

          </div>

        </div>
    </div>

@endsection
