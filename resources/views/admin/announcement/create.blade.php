@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">Add New Accouncement</div>

        <div class="card-body">

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif


            <form class="" action="{{ route('announcement.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Announcement</label>
                    <input type="text" name="announcement" value="" class="form-control">
                </div>
                <div class="text-center">
                    <button type="submit" name="button" class="btn btn-success btn-sm px-3">Add Announcement</button>
                </div>

            </form>
        </div>
    </div>

@endsection
