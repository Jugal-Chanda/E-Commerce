@extends('layouts.home')

@section('customcss')

<style media="screen">

</style>

@endsection

@section('content')

<div class="container">
  <div class="my-2">
    @if(count($announcements))
      <marquee behavior="scroll" direction="left" style="color: red; font-weight: 400;">
        @foreach($announcements as $announcement)
        ***{{ $announcement->announcement }}***
        @endforeach
      </marquee>
    @endif
  </div>
  <div class="row align-items-center" style="height: 100vh;">
    @if (count($errors) >0)
        <ul class="" style="list-style: none; padding: 10px 0px;">
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <h2 class="text-info ">Your Order is placed. You can get confirmation by email and by phone Call</h2>
  </div>
</div>

@endsection
