@extends('layouts.app')

@section('content')
<div class="container">
   
    <form action="/p" method="post" enctype="multipart/form-data">
    
        <div class="row">
            <h1>Add New Post</h1>
        </div>

        <div class="form-group row">

            <label for="caption">Post Caption</label>
            <input type="text" name="caption" id="text" class="form-control @error('caption') is-invalid @emderror" value="{{ old('caption')}}" autocomplete="caption" autofocus>

            @error('captiom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="row">
            <label for="image">Post Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

            @error('image')
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="row pt-4">
                <button type="submit" class="btn btn-primary">Add new post</button>
            </div>
    </form>
    
</div>
@endsection
