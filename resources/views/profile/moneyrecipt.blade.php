@extends('profile.profileLayout')

@section('profileCss')

<style media="screen">
img {
  width:100%;
}
.header td{
  width:50%;
}
</style>
@endsection

@section('profileContent')

<div class="card">
  <div class="card-header">
    Profile
  </div>
  <div class="card-body">
    <table style="width: 100%;" class="header">
      <tr>
        <td>
          <img src="{{ asset('custom/img/logo.png') }}" alt="">
        </td>
        <td class="text-right">
          Invoice# {{ $order->order_no }}<br>
          Date: {{ \Carbon\Carbon::parse($order->created_at)->format('d M y') }}
        </td>
      </tr>
      <tr>
        <td class="text-left">
          Customer Name: {{ $order->customer->user->name }}<br>
          Phone: {{ $order->customer->user->phone }}<br>
          Email: {{ $order->customer->user->email }}<br>
        </td>
        <td class="text-right">
          Shipping Address<br>
          <hr>
          {{ $order->customer->user->address }}
          {{ $order->customer->town_city }}<br>
          {{ $order->customer->state_country }},
          {{ $order->customer->postcode_zip }}<br>
        </td>
      </tr>

    </table>
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Product Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order->orderderedProducts  as $orderderedProduct)
        <tr>
          <td>  {{ $orderderedProduct->product->name }}</td>
          <td>  {{ $orderderedProduct->quantity }}</td>
          <td>  {{ $orderderedProduct->price }}</td>
          <td>  {{  $orderderedProduct->quantity  * $orderderedProduct->price }}</td>
        </tr>
        @endforeach
        <tr>
          <td> </td>
          <td></td>
          <td> Delivary</td>
          <td>
            @if($order->delivery_address)
            60
            @else
            100
            @endif
          </td>
        </tr>
        @if($order->discount != 0)
        <tr>
          <td> </td>
          <td></td>
          <td> Discount</td>
          <td>
            -{{$order->discount}}
          </td>
        </tr>
        @endif
        <tr>
          <td> </td>
          <td></td>
          <td> Total</td>
          <td> {{ $order->total_price }} Tk</td>
        </tr>
      </tbody>

    </table>
  </div>
</div>

@endsection
