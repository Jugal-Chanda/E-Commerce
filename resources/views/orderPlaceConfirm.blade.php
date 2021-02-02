@extends('layouts.home')

@section('customcss')

<style media="screen">

</style>

@endsection

@section('content')
@if (count($errors) >0)
    <ul class="" style="list-style: none; padding: 10px 0px;">
        @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="row align-items-center" style="height: 100vh;">
  <h2 class="text-info ">Your Order is placed. You can get confirmation by email and by phone Call</h2>
</div>
@endsection