@extends('profile.profileLayout')

@section('profileContent')


<div class="card">
  <div class="card-header">
    Edit Profile
  </div>
  <div class="card-body">

    <form class="" action="{{ route('profile.update') }}" method="post">
      @csrf
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
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Phone</label>
        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Addres</label>
        <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control" required>
      </div>
      <div class="form-group text-center">
        <button class="btn btn-success btn-sm px-3">Update</button>
      </div>
    </form>
  </div>

</div>

@endsection
