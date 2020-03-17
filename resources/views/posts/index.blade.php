@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{ route('posts.create') }}" class="btn btn-primary float-right mb-3">
        Add a post
    </a>
</div>
<div class="card">
  <div class="card-header">
    Posts
  </div>
  <div class="card-body">
    @if ( $posts->count() > 0)
      <table class="table table-bordered">
        <thead class="thead-default">
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody style="background-color: #fff;">
          @foreach ($posts as $post)
          <tr>
            <td>
              <img src="{{ asset('storage/' . $post->image) }}" width="100px" alt="{{ $post->title }}">
            </td>
            <td>{{ $post->title }}</td>
            <td>
              <form class="float-right ml-2" action="{{ route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                  {{-- if post got moved to trash --}}
                  {{ $post->trashed() ? 'Delete' : 'Trash'}} 
                </button>
              </form>
              @if (!$post->trashed()) 
                <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-success btn-sm float-right">Edit</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
    <h3 class="text-center text-muted">There is no posts to show.</h3>
    @endif
  </div>
</div>

    
@endsection