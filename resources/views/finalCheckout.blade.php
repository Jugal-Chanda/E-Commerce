@extends('layouts.home')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-6 offset-md-3">
        <h3>Your Order</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0
                @endphp
                @foreach($carts as $key=>$cart)
                    <tr scope="row" class="text-capitalize">
                        <td>{{ $cart['name'] }}</td>
                        <td>{{ $cart['price']*$cart['quantity'] }}</td>
                        @php
                            $total+= $cart['price']*$cart['quantity']
                        @endphp
                    </tr>
                @endforeach

                <tr scope="row">
                    <td> <strong>Cart Subtotal</strong> </td>
                    <td><strong>{{ $total }}</strong></td>
                </tr>
                @if($promo)
                <tr>
                  <td>Discount</td>
                  <td>-{{ ($total*($promo->percentage/100)) }}</td>
                  @php $total = $total-($total*($promo->percentage/100)) @endphp
                </tr>
                <tr>
                  <td>After Discount</td>
                  <td>{{ $total }}</td>
                </tr>
                @endif
                <tr scope="row">
                    <td> <strong>Delivary</strong> </td>
                    @if($delivary == "in_dhaka")
                      <td><strong>60</strong></td>
                      @php  $total = $total + 60 @endphp
                    @else
                      <td><strong>100</strong></td>
                      @php  $total = $total + 100 @endphp
                    @endif
                </tr>
                <tr scope="row">
                    <td> <strong>Total</strong> </td>
                    <td><strong>{{ $total }}</strong></td>
                </tr>
            </tbody>

        </table>

        <div class="payment_method mt-4">

            <!-- <div class="form-group">
                <input type="radio" name="payment_method" value="bkash" class="" id="payment_bkash">
                <label for="payment_bkash">By bKash</label>
            </div> -->
            <div class="form-group">
                <input type="radio" name="payment_method" value="cash_on" class="" id="payment_cash_on" checked>
                <label for="payment_cash_on">Cash On Delivary</label>
            </div>



            <div class="payment_note">
            <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
            </div>
            <div class="my-2">
                <a href="{{ route('order.final_Chekcout',['delivary'=>$delivary,'total'=>$total]) }}" class="btn btn-success w-100">Place Order</a>
            </div>

        </div>


    </div>
  </div>

</div>
@endsection
