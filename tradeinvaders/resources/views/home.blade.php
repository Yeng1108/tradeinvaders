@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <div class=""></div>asd
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <h1>{{ $user->username }}</h1>
                </div> 

                <a href="/p/create" class="btn btn-primary"> Add New Post</a>
            </div>

            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user->posts->count() }}</strong>&nbspPost</div>
                <div class="pr-3"><strong>24k</strong>&nbspFollowers</div>
                <div class="pr-3"><strong>300</strong>&nbspFollowing</div>
            </div>
            <div class="pt-4 font-weight: bold">Jovenil Medina</div>
            <div class="div">{{ $user->profile->title }}</div>
            <div class="div">jovenilmedina.com1</div>
        </div>
    </div>

    
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection
