@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">Products</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Total Price</th>
                        <th>Payment</th>
                        <th>Actione</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td> <a href="{{ route('admin.order.single',['order'=>$order]) }}">{{ $order->order_no }}</a> </td>
                    <td>{{ $order->customer->user->name }}</td>
                    <td>{{ $order->customer->user->phone }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->payment_mathod }}</td>
                    <td>
                      @if(is_null($order->status))
                        <a href="{{ route('order.confirm',['order'=> $order]) }}" class="btn btn-success btn-sm">Confirm</a>

                      @else
                        @if($order->status)
                          @if($order->delivered)
                          <span class="text-success">Delivered</span>
                          @else
                            <a href="{{ route('order.delivered',['order'=>$order]) }}" class="btn btn-danger btn-sm">Delivered</a>
                          @endif
                        @else
                          <span class="text-danger">Declined</span>
                        @endif
                      @endif
                      <br><a href="{{ route('order.decline',['order'=> $order]) }}" class="btn btn-danger btn-sm m-1">Decline</a>

                    </td>
                  </tr>

                  @endforeach


                </tbody>
            </table>
        </div>
    </div>

@endsection
