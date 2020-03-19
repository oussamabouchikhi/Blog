@extends('layouts.app')

@section('content')

{{-- display error message if found --}}
@if (session()->has('error'))
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div>
@endif

<div class="card">
  <div class="card-header">
    users
  </div>
  <div class="card-body">
    @if ( $users->count() > 0)
      <table class="table table-bordered">
        <thead class="thead-default">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Role</th>
          </tr>
        </thead>
        <tbody style="background-color: #fff;">
          @foreach ($users as $user)
          <tr>
            <td>
              {{-- <img src="{{ asset('storage/' . $user->image) }}" width="100px" alt="{{ $user->title }}"> --}}
              <span>
                  <img src="{{$user->getGravatar()}}" style="border-radius: 50%; width: 50px;" alt="user avatar">
              </span>
            </td>
            <td>{{ $user->name }}</td>
            <td>
              @if (!$user->isAdmin())
                  <form action="{{ route('users.make-admin', $user->id)}}" method="post">
                      @csrf
                      <button class="btn btn-success" type="submit">Make Admin</button>
                  </form>
              @else
                  {{ $user->role }}
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
    <h3 class="text-center text-muted">There is no users to show.</h3>
    @endif
  </div>
</div>

    
@endsection