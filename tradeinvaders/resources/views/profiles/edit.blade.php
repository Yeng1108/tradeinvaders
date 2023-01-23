@extends('layouts.app')

@section('content')
<div class="container">
   
    <form action="/p" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Add New Post</h1>
            </div>

            <div class="form-group row">

                <label for="caption">Post Caption</label>
                <input type="text" name="caption" id="text" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption')}}" autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group row">

                <label for="decription">Description</label>
                <textarea name="decription" id="" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" autocomplete="description" autofocus></textarea>
               

                @error('description')
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
        </div>
    </form>
    
</div>
@endsection
