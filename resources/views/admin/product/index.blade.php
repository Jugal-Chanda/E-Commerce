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
                        <th>Name</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr scope="row">
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <img src="{{ asset($product->image1) }}" alt="Image1" style="height: 60px; width: 60px;">
                            <img src="{{ asset($product->image2) }}" alt="Image2" style="height: 60px; width: 60px;">
                            <br>
                            <img src="{{ asset($product->image3) }}" class="mt-1" alt="Image3" style="height: 60px; width: 60px;">
                            <img src="{{ asset($product->image4) }}" class="mt-1" alt="Image4" style="height: 60px; width: 60px;">
                        </td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                            <form class="d-inline" action="{{ route('product.destroy',['product'=>$product])}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" name="button"  class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
