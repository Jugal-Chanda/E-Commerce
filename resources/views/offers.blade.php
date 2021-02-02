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
        @foreach($offers as $offer)
        <div class="col-md-3 product_container mb-2">
          <div class="product py-2">
            <div class="product_image">
              <a href="{{ route('productSingle',['product'=>$offer->stock->product->id]) }}"><img src="{{ asset($offer->stock->product->image1) }}" alt="Product1"></a>
            </div>
            <div class="product_sort_description">
              {{ $offer->stock->product->name }}
            </div>
            <div class="product_price">
              <div class="offer text-danger">
                <h6>{{$offer->percentage}}% Discount</h6>
              </div>
                ৳ <s>{{ $offer->stock->product->price() }}</s> {{ $offer->stock->product->offerPrice($offer->stock->product->price(),$offer->percentage) }}Tk
            </div>
            <div class="add_to_cart">
              <a href="{{ route('addtocart',['id'=>$offer->stock->product->id]) }}"class="btn add_to_cart_btn">Add to Cart</a>
            </div>

          </div>
        </div>
        @endforeach

      </div>



    </section>



@endsection
