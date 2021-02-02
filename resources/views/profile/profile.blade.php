@extends('profile.profileLayout')

@section('profileContent')

<div class="card">
  <div class="card-header">
    Profile
  </div>
  <div class="card-body">
    <table class="">
      <tr>
        <td>Name</td>
        <td>{{ Auth::user()->name }}</td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>{{ Auth::user()->phone }}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
    </table>
  </div>
</div>

@endsection
