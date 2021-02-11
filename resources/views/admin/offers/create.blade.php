@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">Create Category</div>

        <div class="card-body">

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif


            <form class="" action="{{ route('offer.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Offer Title</label>
                    <input type="text" name="title" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Description/Condition</label>
                  <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Offer Percentage</label>
                  <input type="number" name="percentage" value="" min="0" step=".01" max="100" class="form-control">
                </div>
                <label for="">Select Stocks</label>
                <div class="">
                  @foreach($stocks as $stock)
                  <input type="checkbox" name="stocks[]" value="{{ $stock->id }}" id="{{ $stock->id }}"> <label for="{{ $stock->id }}">{{ $stock->product->name }}</label><br>
                  @endforeach
                </div>
                <div class="">
                  <label for="">Promo Code</label>
                  <input type="text" name="promo" value="" id="" class="form-control"> 

                </div>
                <div class="text-center">
                    <button type="submit" name="button" class="btn btn-success btn-sm px-3">Store</button>

                </div>

            </form>
        </div>
    </div>

@endsection
