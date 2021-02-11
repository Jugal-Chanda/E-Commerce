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
            <table class="table">
              <thead>
                <tr>
                  <th>Offer Title</th>
                  <th>Percentage</th>
                  <th>Promo Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($offers as $offer)
                <tr>
                  <td>
                    @if($offer->title)
                    {{ $offer->title }}
                    @else
                    None
                    @endif
                  </td>
                  <td>{{ $offer->percentage }}%</td>
                  <td>
                    @if($offer->promo_code)
                    {{ $offer->promo_code }}
                    @else
                    None
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('offer.delete',['offer'=>$offer]) }}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
        </div>
    </div>

@endsection
