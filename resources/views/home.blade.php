@extends('layouts.home')

@section('content')
<div class="row no-gutters">
    <div class="col-lg-3 col-md-4 category_sidebar">
        <div class="category_sidebar_header">
            <h4 class="text-center">Category</h4>
        </div>

        <div class="category_sidebar_content mt-2 pb-2">
            <ul class="navbar-nav flex-column">
                @foreach($categories as $category)
                <li class="category_sidebar_item">
                    <a href="" class="category_sidebar_item_link"> {{ $category->name }} </a>
                </li>
                @endforeach

            </ul>
            <div class="social_payment">
                <!-- Social site -->
                <div class="">
                    <h5 class="text-center">Social</h5>
                    <div class="social_container">
                        <div class="d-flex social_content">
                            <div class="social_logo">
                                <a class="navbar-brand" href="#"><img src="{{ asset('custom/img/home/amex.png') }}" alt=""></a>
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
    </div>
    <div class="col-lg-9 col-md-8 px-md-3">
        <!-- Search bar -->
        <div class="">
            <div class="row no-gutters">
                <div class="col-9">
                    <form class="">
                        <div class="fomr-group">
                            <input type="text" name="" value="" class="form-control search_input">
                            <button type="button" name="button" class="btn search_btn"><i class="fa fa-search fa-lg " aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <div class="cart_icon">
                        <a href="#"><i class="fas fa-shopping-cart fa-lg"></i></a>
                        <div class="cart_count">
                            10
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End search bar -->
        <!-- Product section -->
        <div class="mt-2">
            <h4 class="product_section_titile">Featured Products</h4>
            <div class="">
                <div class="row no-gutters">

                    <!-- Product single -->
                    @foreach($products as $product)
                        <div class="col-md-4 product_container mt-2">
                            <div class="product py-2">
                                <div class="product_image">
                                      <a href="#"><img src="{{ asset($product->image1) }}" alt="Product1" style="height: 200px; width: 200px;"></a>
                                </div>
                                <div class="product_sort_description">
                                    {{ $product->name }}
                                </div>
                                <div class="product_price">
                                    ৳ 1400 Tk
                                </div>
                                <div class="add_to_cart d-flex">
                                    <a href=""class="btn btn-info add_to_cart_btn">Add to Cart</a>
                                    <button type="button" name="button" class="btn wish_list_btn ml-2"> <i class="far fa-heart fa-lg"></i> </button>
                                </div>

                            </div>
                        </div>
                        @endforeach


                    <!--End-->

                </div>
            </div>
            <div class="view_more_product_btn">
                <a href="">View More...</a>
            </div>
        </div>

        <!-- end featured porduct section -->

        <!-- Best Sell -->
        <div class="mt-2">
            <h4 class="product_section_titile">Best Sell</h4>
            <div class="">
                <div class="row no-gutters">
                    <!-- Product Best Sell -->
                    @foreach($products as $product)
                    <div class="col-md-4 product_container mt-2">
                        <div class="product py-2">
                            <div class="product_image">
                                <a href="#"><img src="{{ asset($product->image1) }}" alt="Product1" style="height: 200px; width: 200px;"></a>
                            </div>
                            <div class="product_sort_description">
                                {{ $product->name }}
                            </div>
                            <div class="product_price">
                                ৳ 5,000 Tk
                            </div>
                            <div class="add_to_cart d-flex">
                                <button type="button" name="button" class="btn btn-info add_to_cart_btn">Add to Cart</button>
                                <button type="button" name="button" class="btn wish_list_btn ml-2"> <i class="far fa-heart fa-lg"></i> </button>
                            </div>

                        </div>
                    </div>
                    @endforeach

                    <!-- End Product best sell -->

                </div>
            </div>
            <div class="view_more_product_btn">
                <a href="">View More...</a>
            </div>
        </div>

        <!-- end Best sell -->

    </div>

</div>

@endsection
