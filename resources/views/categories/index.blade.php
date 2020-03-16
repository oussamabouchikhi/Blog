@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{ route('categories.create') }}" class="btn btn-primary float-right mb-3">
        Add a category
    </a>
</div>
{{-- 
<div class="card card-default">
    <div class="card-header">Categories</div>
    <table class="card-body table-bordered">
        // There are no categories
        <table class="table">
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                      <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm float-right">Edit</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </table>
</div> --}}

<table class="table table-bordered">
    <thead class="thead-default">
      <tr>
        <th>Categories</th>
      </tr>
    </thead>
    <tbody style="background-color: #fff;">
      @foreach ($categories as $category)
      <tr>
        <td>
          {{ $category->name }}
          <form class="float-right ml-2" action="{{ route('categories.destroy', $category->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
              Delete
            </button>
          </form>
          <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-success btn-sm float-right">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
@endsection