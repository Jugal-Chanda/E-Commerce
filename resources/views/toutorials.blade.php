@extends('layouts.home')

@section('css')

<link rel="stylesheet" href="{{asset('custom/css/home.css')}}">
<style media="screen">
  .offer h6 {
    font-weight: bolder;
  }
</style>

@endsection

@section('content')
<section class="container mt-3">

      <div class="row">
        @foreach($toutorials as $toutorial)
        <div class="col-md-6 mb-2">
          <div class="card">
            <div class="card-header">
              {{ $toutorial->name }}
            </div>
            <div class="card-body">
              <ol>
                @foreach($toutorial->parts as $part)
                <li> <a href="https://www.youtube.com/watch?v={{ $part->code }}">{{ $toutorial->name }} ({{ $part->title }}) </a> </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>
        @endforeach

      </div>



    </section>



@endsection
