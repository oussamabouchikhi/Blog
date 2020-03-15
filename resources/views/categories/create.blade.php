@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Add a new Category</div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category">Name:</label>
                <input 
                    type="text" name="name"
                    class="@error('name') is-invalid @enderror form-control"
                    placeholder="Enter a category name"
                    >
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">Add</button>
            </div>
        </form>
    </div>
</div>
    
@endsection