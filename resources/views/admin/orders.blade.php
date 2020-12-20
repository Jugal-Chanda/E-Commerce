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
                    </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td> <a href="{{ route('admin.order.single',['order'=>$order]) }}">{{ $order->order_no }}</a> </td>
                    <td>{{ $order->customer->user->name }}</td>
                    <td>{{ $order->customer->phone }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->payment_mathod }}</td>
                  </tr>

                  @endforeach


                </tbody>
            </table>
        </div>
    </div>

@endsection
