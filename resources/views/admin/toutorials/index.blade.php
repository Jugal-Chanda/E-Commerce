@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">All Toutorials Playlist</div>

        <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <td>Sl</td>
                  <td>Toutorial Name</td>
                  <td>Total Vedio</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                @foreach($toutorials as $toutorial)
                <tr>
                  <td>1</td>
                  <td>{{ $toutorial->name }}</td>
                  <td class="">{{ $toutorial->parts()->count() }}</td>
                  <td>
                    <a href="{{ route('toutorials.show',['toutorial'=>$toutorial]) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('toutorials.edit',['toutorial'=>$toutorial]) }}" class="btn btn-info btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('toutorials.destroy',['toutorial'=>$toutorial]) }}" method="post">
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
