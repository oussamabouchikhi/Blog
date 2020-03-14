@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Add a new Category</div>
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="category">Name:</label>
                <input 
                    type="text"  class="form-control"
                    placeholder="Enater a category name"
                    >
            </div>
            <div class="form-group">
                <a href="" class="btn btn-primary btn -block">Add</a>
            </div>
        </form>
    </div>
</div>
    
@endsection