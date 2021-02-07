@extends('layouts.admin')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">Edit of {{ $product->name }} (Model: {{ $product->model }})</div>

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

            <form class="" action="{{ route('product.update',['product'=>$product]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Model</label>
                    <input type="text" name="model" value="{{ $product->model }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" rows="8" cols="80" class="form-control" id="description" >{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Image1</label>
                    <input type="file" name="image1" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image2</label>
                    <input type="file" name="image2" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image3</label>
                    <input type="file" name="image3" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image4</label>
                    <input type="file" name="image4" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Select Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" name="button" class="btn btn-success btn-sm px-3">Store</button>

                </div>

            </form>
        </div>
    </div>

@endsection

@section('script')
<script>
  $('#description').summernote({
    placeholder: 'Product description',
    tabsize: 2,
    height: 100
  });
</script>
@endsection
