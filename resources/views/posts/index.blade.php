@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{ route('posts.create') }}" class="btn btn-primary float-right mb-3">
        Add a post
    </a>
</div>

<table class="table table-bordered">
    <thead class="thead-default">
      <tr>
        <th>Posts</th>
      </tr>
    </thead>
    <tbody style="background-color: #fff;">
      @foreach ($posts as $post)
      <tr>
        <td>
          {{ $post->name }}
          <form class="float-right ml-2" action="{{ route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
              Delete
            </button>
          </form>
          <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-success btn-sm float-right">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
@endsection