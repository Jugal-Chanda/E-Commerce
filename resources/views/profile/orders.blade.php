@extends('profile.profileLayout')

@section('profileContent')

<div class="card">
  <div class="card-header">
    Profile
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <td>Order No</td>
          <td>Order Date</td>
          <td>Money Recipt</td>
          <td>Order Status</td>
        </tr>
      </thead>
      <tbody>
        @if($orders)
        @foreach($orders as $order)
        <tr>
          <td>{{ $order->order_no }}</td>
          <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M y') }}</td>
          <td> <a href="{{ route('moneyRecipt',['order'=>$order]) }}">MoneyRecipt</a> </td>
          @if(is_null($order->status))
            <td class="text-info">Pending</td>
          @else
            @if($order->status)
              @if($order->delivered)
                <td class="text-success">Delivered</td>
              @else
                <td class="text-info">Processing</td>
              @endif
            @else
              <td class="text-danger">Canceled</td>
            @endif
          @endif

        </tr>
        @endforeach
        @else
        <tr colspan='5'>
          <td class="text-center">
            No Order Available
          </td>
        </tr>
        @endif
      </tbody>

    </table>
  </div>
</div>

@endsection
