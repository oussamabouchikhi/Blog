@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">Add a new post</div>
    <div class="card-body">
        {{-- we should specify enctype when dealing with files in forms --}}
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="post title">Title:</label>
                <input 
                    type="text" name="title"
                    class="form-control"
                    placeholder="Enter post title"
                    >
            </div> 
            <div class="form-group">
                <label for="post description">Description:</label>
                <input 
                    type="text" name="description"
                    class="form-control"
                    placeholder="Enter post description"
                    >
            </div>
            <div class="form-group">
                <label for="post content">Content:</label>
                {{-- <textarea 
                    type="text" name="content"
                    class="form-control"
                    placeholder="Enter post content"
                    ></textarea> --}}
                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>
            </div>
            <div class="form-group">
                <label for="post image">Image:</label>
                <input style="display: block;" type="file" name="image" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous"></script>
@endsection