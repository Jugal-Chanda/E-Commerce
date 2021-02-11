@extends('layouts.home')



@section('content')

<div class="bg-light">

  <div class="pt-2 container">
    @if (count($errors) >0)
        <ul class="" style="list-style: none; padding: 10px 0px;">
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (session('no_promo'))
        <div class="alert alert-danger" role="alert">
            {{ session('no_promo') }}
        </div>
    @endif
      <div class="row">
          <div class="col-md-6 offset-md-3">
              <h3>Billing Details</h3>
              <div class="">
                  <form class="" action="{{ route('order.placeorder') }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="">Full Name</label>
                          <input type="text" name="full_name" value="@if(Auth::user()) {{ Auth::user()->name }} @endif" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" value="@if(Auth::user()) {{ Auth::user()->email }} @endif" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">Phone</label>
                          <input type="text" name="phone" value="@if(Auth::user()) {{ Auth::user()->phone }} @endif" class="form-control">
                          <small>We will Call this number at the delivary time</small>
                      </div>
                      <div class="form-group">
                          <label for="">Address</label>
                          <input type="text" name="address" value="@if(Auth::user()) {{ Auth::user()->address }} @endif" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">Town/City</label>
                          <input type="text" name="town_city" value="" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">state/Country</label>
                          <input type="text" name="state_country" value="" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">POSTCODE/ZIP</label>
                          <input type="text" name="postcode_zip" value="" class="form-control">
                      </div>
                      <label for="">Delivery</label>
                      <div class="form-group">
                        <input type="radio" name="delivery" value="in_dhaka" id="in_dhaka" checked><label for="in_dhaka" class="ml-2" >Delivery In Dhaka</label><br>
                        <input type="radio" name="delivery" value="out_dhaka" id="out_dhaka"><label for="out_dhaka" class="ml-2">Delivery Out Side Dhaka</label>
                      </div>
                      <div class="form-group">
                          <label for="">Promo Code</label>
                          <input type="text" name="promo" value="" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">Other Notes</label>
                          <textarea name="name" rows="4" cols="80" class="form-control"></textarea>
                      </div>
                      <div class="form-group text-center">
                        <button type="submit" name="button" class="btn btn-success btn-sm px-3">Proced</button>
                      </div>
                    </form>

              </div>
          </div>

      </div>
  </div>

</div>
@endsection
