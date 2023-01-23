@extends('layouts.app')

@section('content')
<div class="container">
   
    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Update Profile</h1>
            </div>

            <div class="form-group row">

                <label for="title">Title</label>
                <input type="text" name="title" id="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $user->profile->title}}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group row">

                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" autocomplete="description" autofocus> {{ old('description') ?? $user->profile->description}}</textarea>
               

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group row">

                <label for="url">URL/Website</label>
                <input type="text" name="url" id="text" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') ?? $user->profile->url}}" autocomplete="url" autofocus>

                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            

            <div class="row">
                <label for="image">Profile Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

                @error('image')
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Update profile </button>
                </div>
        </div>
    </form>
    
</div>
@endsection
