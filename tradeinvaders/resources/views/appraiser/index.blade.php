@extends('layouts.appraiser')

@section('content')
<div class="container">
    <div class="row">
        <div id="profcard" class="profcard p-3 m-2">
            <div class=" image d-flex flex-column justify-content-center align-items-center"> 
               <button id="btnprofile" class="btn btn-secondary"> 
                  <img src="{{ $user->profile->profileImage() }}" height="100" width="100" class="rounded" />
               </button> <span class="name mt-3">{{ auth()->user()->name }}</span> 
               <span class="idd">@ {{ auth()->user()->username }}</span> 
               <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                  <span class="idd1">{{ auth()->user()->email }}</span> <span class="ml-1"><i class="fa fa-copy"></i></span> 
               </div> 
               <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                  {{-- <span class="number">1069 <span class="follow">Followers</span></span>  --}}
               </div> 
               <div class=" d-flex mt-2"> 
                <a href="/profile/{{ $user->id }}/edit"><button  href='asd' class="btn1 btn-dark">Edit Profile</button> </a>
               </div> 
               <div class="text mt-3"> 
                  <span>{{ $user->profile->description }}
                  </span> 
               </div> 
               <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa-brands fa-twitter"></i> <span><i class="fa-brands fa-facebook-f"></i></span> <span><i class="fa-brands fa-instagram"></i></span> <span><i class="fa-brands fa-youtube"></i></span> 
               </div> 
               <div class=" px-2 rounded mt-4 date "> 
                  <span class="join">Joined {{ $user->profile->created_at = date('Y-m-d') }}</span> 
               </div> 
            </div>
        </div>
        <div class="card p-3 m-2" id="profdetailscard">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <h1>{{ $user->username }}</h1>

                  <follow-button user-id="{{ $user->id }}" follows="{{ $userdetails }}"></follow-button>
                </div> 
                @can('update', $user->profile)
                 <a href="/p/create" class="btn btn-primary"> Add New Post</a>
                 @endcan
            </div>
            @can('update', $user->profile)
            
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user->posts->count() }}</strong>&nbspPost</div>
                <div class="pr-3"><strong>{{ $user->profile->followers->count() }}</strong>&nbspFollowers</div>
                <div class="pr-3"><strong>{{ $user->following->count() }}</strong>&nbspFollowing</div>
            </div>
            <div class="pt-4 font-weight: bold">{{ $user->profile->title }}</div>
            <div class="div">{{ $user->profile->description }}</div>
            <div class="div">{{ $user->profile->url }}</div>


            
            <div id="rowapp" class="row">
            <div id="appcard" class="card text-white bg-success mb-3 m-2">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div id="appcard" class="card text-white bg-success mb-3 m-2">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div id="appcard" class="card text-white bg-success mb-3 m-2">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div id="appcard" class="card text-white bg-success mb-3 m-2">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
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
