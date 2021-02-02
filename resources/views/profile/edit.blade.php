@extends('profile.profileLayout')

@section('profileContent')


<div class="card">
  <div class="card-header">
    Edit Profile
  </div>
  <div class="card-body">
    <form class="" action="index.html" method="post">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="" value="{{ Auth::user()->name }}" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="" value="{{ Auth::user()->email }}" class="form-control" required>
      </div>
    </form>
  </div>

</div>

@endsection
