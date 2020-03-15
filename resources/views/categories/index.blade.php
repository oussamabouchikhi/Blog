@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{ route('categories.create') }}" class="btn btn-primary float-right mb-3">
        Add a category
    </a>
</div>

<div class="card card-default">
    <div class="card-header">Categories</div>
    <div class="card-body">
        {{-- There are no categories --}}
        <ul>

            @foreach ($categories as $category)
              <li> {{ $category->name }}</li>
            @endforeach

        </ul>
    </div>
</div>
    
@endsection