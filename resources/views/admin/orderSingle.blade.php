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
            <div class="">
              <table class="table table-hover table-bordered">
                <tr>
                  <td>Order No:</td>
                  <td>{{ $order->order_no }}</td>
                </tr>
                <tr>
                  <td>Customer Name:</td>
                  <td>{{ $order->customer->user->name }}</td>
                </tr>
                <tr>
                  <td>Customer Phone:</td>
                  <td>{{ $order->customer->user->phone }}</td>
                </tr>
                <tr>
                  <td>Customer Address:</td>
                  <td>{{ $order->customer->user->address }}</td>
                </tr>
              </table>


            </div>


            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Id</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($order->orderderedProducts as $product)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product->name }}</td>
                    <td>{{ $product->product->model }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>

                  </tr>
                  @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
