@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{ route('categories.create') }}" class="btn btn-primary float-right mb-3">
        Add a tag
    </a>
</div>
@if ($tags->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>Tags</th>
        </tr>
      </thead>
      <tbody style="background-color: #fff;">
        @foreach ($tags as $tag)
        <tr>
          <td>
            {{ $tag->name }}
            <span class="ml-2 badge badge-primary">{{ $tag->posts->count() }}</span>
            <form class="float-right ml-2" action="{{ route('tags.destroy', $tag->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">
                Delete
              </button>
            </form>
            <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-success btn-sm float-right">Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@else
    <div class="card card-default">
        <div class="card-header">
          Tags
        </div>
        <div class="card-body">
          <h3 class="text-center text-muted">There is no tags to show.</h3>
        </div>
    
    </diV>
@endif
    
@endsection