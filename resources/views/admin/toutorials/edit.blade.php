@extends('layouts.admin')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection


@section('content')

    <div class="card">
        <div class="card-header">Create Toutorial Playlist</div>

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

            <form class="" action="{{ route('toutorials.update',['toutorial'=>$toutorial]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="">Toutorial Name</label>
                  <input type="text" name="name" value="{{ $toutorial->name }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" rows="8" cols="80" class="form-control" id="description">{{ $toutorial->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Thumbnail</label>
                    <input type="file" name="thumbnail" value="" class="form-control">
                </div>

                <label for="">Select Products</label>
                <div class="form-group">
                  @foreach($products as $product)
                  <input type="checkbox" name="product[]" value="{{ $product->id }}" id="{{ $product->id }}"
                  @foreach($toutorial->parts as $p)
                    @if($product->id == $p->product_id)
                    checked
                    @endif
                  @endforeach

                  > <label for="{{ $product->id }}">{{ $product->name }}</label><br>
                  @endforeach
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-success btn-sm px-3">Save</button>
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
