@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        Profile
    </div>
    <div class="card-body">
        <form action="{{  route('users.update', $user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input 
                    type="text" name="name"
                    class="form-control"
                    value="{{ $user->name }}"
                    >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input 
                    type="email" name="email"
                    class="form-control"
                    value="{{ $user->email }}"
                    >
            </div>
            <div class="form-group">
                <label for="about">About:</label>
                <textarea type="text" name="about" class="form-control" 
                          placeholder="Tell the world about you" >
                          {{ $user->about }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input 
                    type="text" name="facebook"
                    class="form-control"
                    {{-- value="{{ $profile->facebook }}" --}}
                    >
            </div>
            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input 
                    type="text" name="instagram"
                    class="form-control"
                    {{-- value="{{ $profile->instagram }}" --}}
                    >
            </div>
            <div class="form-group">
                <label for="image">Profile Image:</label><br>
                <img src="{{ $user->getGravatar()}}" alt="{{$user->name}} profile-image">
                <input 
                    type="file" name="image"
                    class="form-control mt-2"
                    >
            </div>  
            <div class="form-group">
                <button class="btn btn-primary btn-block">
                    Update profile
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection