@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Add a new post</div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            <div class="form-group">
                <label for="post">Title:</label>
                <input 
                    type="text" name="title"
                    class="form-control"
                    placeholder="Enter post title"
                    >
            </div>
            <div class="form-group">
                <label for="post">Description:</label>
                <input 
                    type="text" name="description"
                    class="form-control"
                    placeholder="Enter post description"
                    >
            </div>
            <div class="form-group">
                <label for="post">Content:</label>
                <textarea 
                    type="text" name="content"
                    class="form-control"
                    placeholder="Enter post content"
                    ></textarea>
            </div>
            <div class="form-group">
                <label for="post">Image:</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Add</button>
            </div>
        </form>
    </div>
</div>
    
@endsection