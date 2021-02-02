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

            <form class="" action="{{ route('toutorials.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Toutorial Name</label>
                  <input type="text" name="name" value="" required class="form-control">
                </div>
                <label for="">Select Products</label>
                <div class="form-group">
                  @foreach($products as $product)
                  <input type="checkbox" name="product[]" value="{{ $product->id }}" id="{{ $product->id }}"> <label for="{{ $product->id }}">{{ $product->name }}</label><br>
                  @endforeach
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-success btn-sm px-3">Save</button>
                </div>


            </form>
        </div>
    </div>

@endsection
