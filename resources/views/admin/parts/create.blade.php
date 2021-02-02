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

            <form class="" action="{{ route('parts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Select a Toutorial</label>
                  <select class="form-control" name="toutorial">
                    @foreach($toutorials as $toutorial)
                    <option value="{{ $toutorial->id }}">{{ $toutorial->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Vedio Code</label>
                  <input type="text" name="code" value="" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="">Vedio title</label>
                  <input type="text" name="title" value="" class="form-control" required>
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-success btn-sm px-3">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection
