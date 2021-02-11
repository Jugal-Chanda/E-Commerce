@extends('layouts.home')



@section('content')

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
    <input type="text" name="information" value="" class="d-none" hidden codeCheckUrl = "{{ route('offer.promo_check') }}">
      <div class="row">
          <div class="col-md-6">
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
                        <input type="radio" name="delivery" value="in_dhaka" id="in_dhaka" onclick="deliveryAddress($(this))"><label for="in_dhaka" class="ml-2">Delivery In Side Dhaka</label><br>
                        <input type="radio" name="delivery" value="out_dhaka" id="out_dhaka" onclick="deliveryAddress($(this))"><label for="out_dhaka" class="ml-2">Delivery Out Side Dhaka</label>
                      </div>
                      <div class="form-group">
                          <label for="">Promo Code</label>
                          <input type="text" name="promo" value="" class="form-control">
                          <div class="text-center">
                            <button type="button" name="button" class="btn btn-sm btn-info mt-2 px-3" onclick="codeCheck()">Check</button>
                          </div>
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
                      @foreach($carts as $cart)
                          <tr scope="row" class="text-capitalize">
                              <td>{{ $cart['name'] }}</td>
                              <td>{{ $cart['price']*$cart['quantity'] }}</td>
                              @php
                              $total+=($cart['price']*$cart['quantity'])
                              @endphp
                          </tr>
                      @endforeach
                      <tr class="d-none" id="discountTr">
                        <td> <strong>Discount</strong> </td>
                        <td> <strong id="discountAmmount">0</strong> </td>
                      </tr>
                      <tr scope="row">
                          <td> <strong>Cart Subtotal</strong> </td>
                          <td><strong id="subtotal"> {{ $total }} </strong></td>
                      </tr>

                      <tr>
                        <td> <strong>Delivery</strong> </td>
                        <td> <strong id="delivery_fee">0</strong> </td>
                      </tr>
                      <tr scope="row">
                          <td> <strong>Total</strong> </td>
                          <td><strong id="finalTotal">{{ $total }}</strong></td>
                      </tr>
                  </tbody>

              </table>

              <div class="payment_method mt-4">
                  <div class="form-group">
                      <input type="radio" name="payment_method" value="cash_on" class="" id="payment_cash_on" checked>
                      <label for="payment_cash_on">Cash On Delivary</label>
                  </div>
                  <div class="payment_note">
                  <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
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

@section('js')

<script type="text/javascript">

function codeCheck() {
  var code = $("input[name=promo]").val();
  var url = $("input[name=information]").attr("codeCheckUrl");
  var data = { 'code': $("input[name=promo]").val() };
  var subtotal = parseInt($("#subtotal").text());
  var deliveryfee = parseInt($("#delivery_fee").text());
  $.ajax({
    url: url,
    type: 'post',
    dataType: 'json',
    contentType: 'application/json',
    success: function (responseData) {
      while(!responseData){

      }
      var resData = responseData;
      console.log(resData);
      if(resData['status'] == "ok"){
        var percentage = parseInt(resData['ammount']);
        $("#discountAmmount").text("-"+(subtotal*(percentage/100)));
        $("#discountTr").removeClass("d-none");
        $("#subtotal").text(subtotal - (subtotal*(percentage/100)) + deliveryfee);
        $("#finalTotal").text(parseInt($("#subtotal").text()) + deliveryfee);
      }else{
        alert("Code is not valid");
      }
      // console.log(responseData);
      // window.location.replace("/question/"+ learnId +"/edit");

    },
    data: JSON.stringify(data)
  });
}


function deliveryAddress(el) {
  var subtotal = $("#subtotal").text();
  var discount = parseInt($("#discountAmmount").text());
  if(el.is(":checked")){
    var address = el.val();
    if(address == "in_dhaka"){
      $("#delivery_fee").text(60);
      $("#finalTotal").text(parseInt(subtotal)+60+discount);
    }else{
      $("#delivery_fee").text(100);
      $("#delivery_fee").text(60);
      $("#finalTotal").text(parseInt(subtotal)+100+discount);
    }
  }

}
</script>
@endsection
