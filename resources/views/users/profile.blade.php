@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        Profile
    </div>
    <div class="card-body">
        <form action="{{  route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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
                          {{ $user->profile->about }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input 
                    type="text" name="facebook"
                    class="form-control"
                    value="{{ $profile->facebook }}"
                    >
            </div>
            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input 
                    type="text" name="instagram"
                    class="form-control"
                    value="{{ $profile->instagram }}"
                    >
            </div>
            <div class="form-group">
                <label for="image">Profile Image:</label><br>
                <img src="{{ $user->hasImage() ? asset('storage/' . $user->getImage()) : $user->getGravatar()}}" style='border-radius: 50%; width: 50px;'>
                    {{-- <img src="https://www.google.com/search?q=user+profile+placeholder&rlz=1C1CHBD_frDZ891DZ891&sxsrf=ALeKk02ow2SBUt4moGoe9scBHNdWzEm4Sw:1584810466416&tbm=isch&source=iu&ictx=1&fir=AJVAPsXUg8UHuM%253A%252CwxW9NZXE4dgLPM%252C_&vet=1&usg=AI4_-kSLMqb9ktezeLNpoVpgo5NFS_C0zg&sa=X&ved=2ahUKEwiJ9ouHh6zoAhVnAmMBHX6nBtQQ9QEwDHoECAoQOg#imgrc=AJVAPsXUg8UHuM:"> --}}
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