@extends('layouts.home')
@section('customcss')
<link rel="stylesheet" href="{{ asset('custom/css/mycart.css') }}">
@endsection
@section('content')

  <div class="container pt-2">
    <h5>Cart</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Name</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Quatitty</th>
          <th scope="col">Total</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @php
              $total = 0;
          @endphp

          @if($carts)
              @foreach($carts as $key=>$cart)
                  <tr>
                      <td> <img src="{{ asset($cart['photo']) }}" alt="" style="height: 60px; width: 60px"> </td>
                      <td>{{ $cart['name'] }}</td>
                      <td>{{ $cart['price'] }}</td>
                      <td>
                          <a href="{{ route('decreaseqty',['id'=>$key]) }}" class="btn btn-primary btn-sm p-1">-</a>
                          <span class="qty px-2">{{ $cart['quantity'] }}</span>
                          <a href="{{ route('increaseqty',['id'=>$key]) }}" class="btn btn-primary btn-sm p-1">+</a>
                      </td>
                      <td>{{  $cart['price']*$cart['quantity'] }}</td>
                      @php
                          $total += $cart['price']*$cart['quantity']
                      @endphp
                      <td style="width: 5%;">
                          <a class="text-danger" href="{{ route('deletefromcart',['id'=>$key]) }}"> <i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
              @endforeach
          @else
              <tr>
                  <td colspan="6" class="text-center text-danger">Cart Is Empty. Add some items to the cart first..</td>
              </tr>
          @endif



      </tbody>
    </table>

    <div class="row">
      <div class="col-md-6 d-flex align-items-center">
        <a href="{{ route('home') }}" class="btn btn-primary px-4">Continue Shopping</a>
      </div>
      <div class="col-md-6">
        <div class="card cart_summery">
          <div class="card-body p-5">
            <h4>Card Total</h4>
            <table class="table">
              <tbody>
                <tr>
                  <td class="">SubTotal</td>
                  <td class="text-right">{{ $total }}</td>
                </tr>
                <tr>
                  <td class="">Delivary</td>
                  <td class="text-right">50</td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td class="text-right">{{ $total+50 }}</td>
                </tr>
              </tbody>
            </table>
            <a href="{{ route('checkout') }}" class="btn text-uppercase">Proceed Checkout</a>
          </div>

        </div>

      </div>
    </div>
  </div>


@endsection
