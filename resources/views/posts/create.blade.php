@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{-- if post data were sent so we're updating the post else we're adding a new one --}}
        {{ isset($post) ? 'Edit this post' : 'Add a new post'}}
    </div>
    <div class="card-body">
        {{-- we should specify enctype when dealing with files in forms --}}
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="post title">Title:</label>
                <input 
                    type="text" name="title"
                    class="form-control"
                    placeholder="{{ isset($post) ? '' : 'Enter post title'}}"
                    value="{{ isset($post) ? $post->title : ''}}"
                    >
            </div> 
            <div class="form-group">
                <label for="post description">Description:</label>
                <input 
                    type="text" name="description"
                    class="form-control"
                    placeholder="{{ isset($post) ? '' : 'Enter post description'}}"
                    value="{{ isset($post) ? $post->description : ''}}"
                    >
            </div>
            <div class="form-group">
                <label for="post content">Content:</label>
                {{-- <textarea 
                    type="text" name="content"
                    class="form-control"
                    placeholder="Enter post content"
                    ></textarea> --}}
                    <input value="{{ isset($post) ? $post->content : ''}}" id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>
            </div>
            <div class="form-group">
                <label for="categoryID">Select a category</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select> 
            </div>
            @if ($tags->count() > 0)
                <div class="form-group">
                    <label for="selectTag">Select a tag</label>
                    <select name="tags[]" id="selectTag" class="tagsSelect form-control" multiple>
                        @foreach ($tags as $tag)
                            <option 
                                value="{{ $tag->id }}"
                                {{-- @if ( $post->hasTag($tag->id) )
                                    selected
                                @endif --}}
                                >{{ $tag->name }}</option>
                        @endforeach
                    </select> 
                </div>
            @endif
            
            
            @if (isset($post))
                <div class="form-group">
                    <img style="width:100%" src="{{ asset('storage/' . $post->image) }}">
                </div>
            @endif
            {{-- for sending the current user id --}}
            <input value="{{ Auth::user()->id }}"  type="hidden" name="user_id">


            <div class="form-group">
                <label for="post image">Image:</label>
                <input style="display: block;" type="file" name="image" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ isset($post) ? 'Update' : 'Add'}}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{-- Script2 library --}}
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.tagsSelect').select2();
    });
</script>
@endsection