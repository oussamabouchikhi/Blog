@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{-- because we passed category info to edit function in CategoryController --}}
        {{-- if there is category passed --}}
        {{ isset($category) ? "Edit Category" : "Add a new Category" }}
        </div>
    <div class="card-body">
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            {{-- if we updating category method will be set to PUT --}}
            @if (isset($category))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="category">Name:</label>
                <input 
                    type="text" name="name"
                    class="@error('name') is-invalid @enderror form-control"
                    placeholder="{{ isset($category) ? "" : "Enter a category name" }}"
                    value="{{ isset($category) ? $category->name : "" }}"
                    
                    >
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">
                    {{ isset($category) ? "Update" : "Add" }}
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection