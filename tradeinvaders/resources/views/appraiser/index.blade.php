@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="profcard" class="card col-3 p-5">
            <div class=" image d-flex flex-column justify-content-center align-items-center"> 
               <button id="btnprofile" class="btn btn-secondary"> 
                  <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
               </button> <span class="name mt-3">{{ auth()->user()->name }}</span> <span class="idd">@eleanorpena</span> 
               <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                  <span class="idd1">Oxc4c16a645_b21a</span> <span><i class="fa fa-copy"></i></span> 
               </div> 
               <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                  <span class="number">1069 <span class="follow">Followers</span></span> 
               </div> 
               <div class=" d-flex mt-2"> 
                  <button  href='asd' class="btn1 btn-dark">Edit Profile</button> 
               </div> 
               <div class="text mt-3"> 
                  <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. 
                  </span> 
               </div> 
               <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> 
               </div> 
               <div class=" px-2 rounded mt-4 date "> 
                  <span class="join">Joined May,2021</span> 
               </div> 
            </div>
        </div>
        <div class="card col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <h1>{{ $user->username }}</h1>

                  <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
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
