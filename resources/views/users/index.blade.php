@extends('layouts.app')

@section('content')

{{-- display error message if found --}}
@if (session()->has('error'))
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div>
@endif

<div class="clearfix">
<a href="{{ route('users.create') }}" class="btn btn-primary float-right mb-3">
        Add a user
    </a>
</div>
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
              <span>Avatar</span>
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->role }}</td>
            <td>
              <form class="float-right ml-2" action="{{ route('users.destroy', $user->id)}}" method="user">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                  {{-- if user got moved to trash --}}
                  {{ $user->trashed() ? 'Delete' : 'Trash'}} 
                </button>
              </form>
              @if (!$user->trashed()) 
                <a href="{{ route('users.edit', $user->id)}}" class="btn btn-success btn-sm float-right">Edit</a>
              @else
                <a href="{{ route('trash.restore', $user->id)}}" class="btn btn-success btn-sm float-right">Restore</a>
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