@extends('layouts.home')

@section('css')

<link rel="stylesheet" href="{{asset('custom/css/home.css')}}">

@endsection

@section('content')
<section class="container mt-3">
      <div class="row mb-3">
      <div class="col-md-8">
        <form class="">
            <div class="search_input_btn_container">
                <input type="text" name="" value="" class="form-control search_input" placeholder="Search your product here">
                <button type="button" name="button" class="btn search_btn"><i class="fa fa-search fa-lg " aria-hidden="true"></i></button>
            </div>
        </form>
      </div>
      <div class="col-md-4 cart_icon_container">
        <div class="cart_icon">
          <a href="{{ route('mycart') }}"><i class="fas fa-shopping-cart fa-lg"></i></a>
          <div class="cart_count">
            {{ $cart_count }}
          </div>
        </div>

      </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="category_sidebar">
            <div class="category_sidebar_header">
              <h5>Category</h5>
            </div>
            <ul class="navbar-nav ml-auto">
              @foreach($categories as $category)
              <li class="nav-item side_nav_item">
                <a class="nav-link" href="">{{ $category->name }}</a>
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
            @foreach($products as $product)
            <div class="col-md-3 product_container mb-2">
              <div class="product py-2">
                <div class="product_image">
                  <a href="{{ route('productSingle',['product'=>$product->id]) }}"><img src="{{ asset($product->image1) }}" alt="Product1"></a>
                </div>
                <div class="product_sort_description">
                  {{ $product->name }}
                </div>
                <div class="product_price">
                  ৳ {{ $product->price() }} Tk
                </div>
                <div class="add_to_cart">
                  <a href="{{ route('addtocart',['id'=>$product->id]) }}"class="btn add_to_cart_btn">Add to Cart</a>
                </div>

              </div>
            </div>
            @endforeach

          </div>
          {{ $products->onEachSide(3)->links() }}

        </div>

      </div>

    </section>



@endsection
