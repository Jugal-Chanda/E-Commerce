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
            @if($offer->stock->product->hasStock())
              @if($offer->stock->product->stock()->hasOffer())
              <div class="product_price product_offer">
                <span>{{ $offer->stock->product->priceShow("original") }}</span>
                {{ $offer->stock->product->priceShow("offer") }}
              </div>
              @else
              <div class="product_price">
                {{ $offer->stock->product->priceShow("original") }}
              </div>
              @endif
            @else
            <div class="product_out_of_stock">
              {{ $offer->stock->product->priceShow("original") }}
            </div>
            @endif

            <div class="add_to_cart">
              <a href="{{ route('addtocart',['id'=>$offer->stock->product->id]) }}"class="btn add_to_cart_btn">Add to Cart</a>
            </div>

          </div>
        </div>
        @endforeach

      </div>



    </section>





@endsection
