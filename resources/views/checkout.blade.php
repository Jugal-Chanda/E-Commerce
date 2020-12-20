@extends('layouts.home')

@section('customcss')

<style media="screen">
.payment_method {
  box-shadow: 5px 7px 10px 2px #a6a6a6;
  padding: 10px;
  margin-top: 15px;
}

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
<div class="pt-2">
    <div class="row">
        <div class="col-md-6">
            <h3>Billing Details</h3>
            <div class="">
                <form class="" action="{{ route('order.placeorder') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="full_name" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="" class="form-control">
                        <small>We will Call this number at the delivary time</small>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" value="" class="form-control">
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
                    <div class="form-group">
                        <label for="">Other Notes</label>
                        <textarea name="name" rows="4" cols="80" class="form-control"></textarea>
                    </div>

            </div>
        </div>
        <div class="col-md-6">
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
                    <tr scope="row">
                        <td> <strong>Delivary</strong> </td>
                        <td><strong>50</strong></td>
                    </tr>
                    <tr scope="row">
                        <td> <strong>Total</strong> </td>
                        <td><strong>{{ $total+50 }}</strong></td>
                    </tr>
                </tbody>

            </table>

            <div class="payment_method mt-4">

                <div class="form-group">
                    <input type="radio" name="payment_method" value="bkash" class="" id="payment_bkash">
                    <label for="payment_bkash">By bKash</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="payment_method" value="cash_on" class="" id="payment_cash_on" checked>
                    <label for="payment_cash_on">Cash On Delivary</label>
                </div>



                <div class="payment_note">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                <div class="my-2">
                    <button type="submit" name="button" class="btn btn-success w-100">Place Order</button>
                </div>
                </form>

            </div>


        </div>
    </div>
</div>
@endsection
