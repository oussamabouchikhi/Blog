@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{ route('categories.create') }}" class="btn btn-primary float-right mb-3">
        Add a tag
    </a>
</div>

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
    
@endsection