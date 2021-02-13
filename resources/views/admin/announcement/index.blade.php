@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
          Announcements
          <a href="{{ route('announcement.create') }}" class="btn btn-info btn-sm float-right">Create New</a>
        </div>

        <div class="card-body">

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif


            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Announcement</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($announcements as $announcement)
                <tr>

                  <td>{{ $announcement->announcement  }}</td>
                  <td class="">
                    @if($announcement->visible)
                      <span class="text-success">Visible Now</span>
                    @else
                      <span class="text-danger">Invisible</span>
                    @endif
                  </td>
                  <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('d M y') }}</td>
                  <td>
                    <a href="{{ route('announcement.change_visibility',['announcement'=>$announcement]) }}" class="btn btn-primary btn-sm my-1">Change visibility</a>
                    <a href="{{ route('announcement.edit',['announcement'=>$announcement]) }}" class="btn btn-info btn-sm my-1">Edit</a>
                    <form class="" action="{{ route('announcement.destroy',['announcement'=>$announcement]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" name="button" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>

@endsection
