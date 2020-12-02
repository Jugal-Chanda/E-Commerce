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


            <form class="" action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="" class="form-control">
                </div>
                <div class="text-center">
                    <button type="submit" name="button" class="btn btn-success btn-sm px-3">Store</button>

                </div>

            </form>
        </div>
    </div>

@endsection
