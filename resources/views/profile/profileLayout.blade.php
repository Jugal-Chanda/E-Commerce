@extends('layouts.home')

@section('css')

<link rel="stylesheet" href="{{asset('custom/css/profile.css')}}">

@endsection

@section('content')

<section class="container">
  <div class="row">
    <div class="col-md-4">
      <ul class="list-group">
        <li class="list-group-item bg-light mb-1">
          <a class="" href="{{route('profile')}}">Profile</a>
        </li>
        <li class="list-group-item bg-light mb-1">
          <a href="{{ route('profile.edit') }}"> Edit Profile</a>
        </li>
        <li class="list-group-item bg-light mb-1">
          <a href="">Delete Account</a>
        </li>
        <li class="list-group-item bg-light mb-1">
          <a href="">Orders</a>
        </li>
      </ul>
    </div>
    <div class="col-md-8">
      @yield('profileContent')

    </div>

  </div>
</section>

@endsection

@section('js')

@endsection
