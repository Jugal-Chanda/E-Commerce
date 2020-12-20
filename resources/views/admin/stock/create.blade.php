@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">Create Stock</div>

        <div class="card-body">
            @if (count($errors) >0)
                <ul class="" style="list-style: none; padding: 10px 0px;">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="" action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Select a product</label>
                    <select class="form-control" name="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Buying Price</label>
                    <input type="text" name="buying_price" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Selling Price</label>
                    <input type="text" name="selling_price" value="" class="form-control">
                </div>


                <div class="text-center">
                    <button type="submit" name="button" class="btn btn-success btn-sm px-3">Store</button>

                </div>

            </form>
        </div>
    </div>

@endsection
