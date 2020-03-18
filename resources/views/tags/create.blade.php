@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{-- because we passed tag info to edit function in tagController --}}
        {{-- if there is tag passed --}}
        {{ isset($tag) ? "Edit tag" : "Add a new tag" }}
        </div>
    <div class="card-body">
        <form action="{{ isset($tag) ? route('categories.update', $tag->id) : route('categories.store') }}" method="POST">
            @csrf
            {{-- if we updating tag method will be set to PUT --}}
            @if (isset($tag))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="tag">Name:</label>
                <input 
                    type="text" name="name"
                    class="@error('name') is-invalid @enderror form-control"
                    placeholder="{{ isset($tag) ? "" : "Enter a tag name" }}"
                    value="{{ isset($tag) ? $tag->name : "" }}"
                    
                    >
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">
                    {{ isset($tag) ? "Update" : "Add" }}
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection