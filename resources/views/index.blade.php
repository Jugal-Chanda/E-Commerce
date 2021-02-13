@extends('layouts.home')

@section('css')

<link rel="stylesheet" href="{{asset('custom/css/home.css')}}">
<style media="screen">
.strike{
  text-decoration: line-through;
  text-decoration-color: red;
}
</style>

@endsection

@section('content')
<section class="container mt-3">


      <div class="row mb-3">
        <div class="col-md-12">
            <div class="search_input_btn_container">
              <form class="" action="" method="get">
                <input type="text" name="search" value="" class="form-control search_input" placeholder="Search your product here">
                <button type="button" name="button" class="btn search_btn"><i class="fa fa-search fa-lg " aria-hidden="true"></i></button>
              </form>

            </div>
        </div>
      </div>
      <div class="my-2">
        @if(count($announcements))
          <marquee behavior="scroll" direction="left" style="color: red; font-weight: 400;">
            @foreach($announcements as $announcement)
            ***{{ $announcement->announcement }}***
            @endforeach
          </marquee>
        @endif
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="category_sidebar">
            <div class="category_sidebar_header">
              <h5>Category</h5>
            </div>
            <ul class="navbar-nav ml-auto">
              @if($kit)
              <li class="nav-item side_nav_item bg-info text-uppercase" >
                <a class="nav-link" href="{{ route('category.product',['category'=>$kit]) }}" style="color: white; font-weight: 600;letter-spacing: 0.1em;">{{ $kit->name }}</a>
              </li>
              @endif
              @foreach($categories as $category)
              <li class="nav-item side_nav_item">
                <a class="nav-link" href="{{ route('category.product',['category'=>$category]) }}">{{ $category->name }}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="social_payment">
            <!-- Social site -->
            <div class="">
              <h5 class="text-center">Social</h5>
              <div class="social_container">
                <div class="d-flex social_content align-items-center">
                  <div class="social_logo">
                    <a class="" href="#"><img src="{{ asset('custom/img/logo.png') }}" alt="" style="width: 80px;"></a>
                  </div>
                  <a href="">Zontrotech</a>

                </div>
                <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FewuRoboticsClub%2F&width=99&layout=button_count&action=like&size=large&share=false&height=21&appId=361973217839028" width="99" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
              </div>

            </div>
            <div class="mt-2">
              <h5 class="text-center">Payment Mathod</h5>
              <div class="payment_mathod">
                <div class="icon">
                  <i class="far fa-money-bill-alt"></i>
                </div>
                <p>Cash On delivary</p>
              </div>
              <div class="payment_mathod">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="-18.0015 -28.3525 156.013 170.115"><g fill="none"><path fill="#D12053" d="M96.58 62.45l-53.03-8.31 7.03 31.6z"/><path fill="#E2136E" d="M96.58 62.45L56.62 6.93 43.56 54.15z"/><path fill="#D12053" d="M42.32 53.51L.45 0l54.83 6.55z"/><path fill="#9E1638" d="M23.25 31.15L0 9.24h6.12z"/><path fill="#D12053" d="M107.89 35.46l-9.84 26.69L82.1 40.09z"/><path fill="#E2136E" d="M56.77 84.14l38.61-15.51L97 63.7z"/><path fill="#9E1638" d="M25.89 113.41l16.54-58.02 8.39 37.75z"/><path fill="#E2136E" d="M109.43 35.67l-4.06 11.02 14.64-.24z"/></g></svg>
                </div>
                <p style="margin: -15px 0 0 0;">Payment by Bkash</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-12 text-center">
              <h3 class="">Best Sell Products</h3>
              <hr>
            </div>
            @foreach($products as $product)
            <div class="col-md-3 product_container mb-2">
              <div class="product py-2">
                <div class="product_image">
                  <a href="{{ route('productSingle',['product'=>$product->id]) }}"><img src="{{ asset($product->image1) }}" alt="Product1"></a>
                </div>
                <div class="product_sort_description">
                  {{ $product->name }}
                </div>
                @if($product->hasStock())
                  @if($product->stock()->hasOffer())
                  <div class="product_price product_offer">
                    <span>{{ $product->priceShow("original") }}</span>
                    {{ $product->priceShow("offer") }}
                  </div>
                  @else
                  <div class="product_price">
                    {{ $product->priceShow("original") }}
                  </div>
                  @endif
                @else
                <div class="product_out_of_stock">
                  {{ $product->priceShow("original") }}
                </div>
                @endif

                <div class="add_to_cart">
                  <a href="{{ route('addtocart',['id'=>$product->id]) }}"class="btn add_to_cart_btn">Add to Cart</a>
                </div>

              </div>
            </div>
            @endforeach


          </div>

          <div class="row">
            <div class="col-12 text-center">
              <h3>Latest Toutorials</h3>
              <hr>
            </div>
            @foreach($toutorials as $toutorial)
            <div class="col-md-6">
              <iframe  type="text/html" height="200" src="https://www.youtube.com/embed/{{ $toutorial->code }}" frameborder="0" allowfullscreen style="width: 100%;"></iframe>
              <h5>{{ $toutorial->title }}</h5>
            </div>
            @endforeach
          </div>


        </div>

      </div>

    </section>





@endsection
