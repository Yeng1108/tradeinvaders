@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        {{-- <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" alt="" class="w-100 rounded-circle">
        </div> --}}
        <div class="col-12 p-5">
            <h3>User Management {{ auth()->user()->id }}</h3>
            <div class="d-flex justify-content-between align-items-baseline">
                
                <div class="d-flex align-items-center pb-4">
                
                    
                 
                </div> 
                @can('update', auth()->user()->id)
                 <a href="/p/create" class="btn btn-primary"> Add User</a>
                 @endcan
            </div>
            {{-- @can('update', $user->profile)
            
            
            @endcan --}}
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user->count() }}</strong>&nbspUser</div>
                <div class="pr-3"><strong></strong>&nbspActive</div>
                <div class="pr-3"><strong></strong>&nbspInactive</div>
            </div>
            <div class="pt-4 font-weight: bold"></div>
            <div class="div"></div>
            <div class="div"></div>

            <table class="table table-responsive">
                <thead>asd</thead>
                    <tr>
                        <td>Full Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Department</td>
                        <td>Account type</td>
                        <td>Created At</td>
                        <td>Password</td>
                    </tr>
                <tbody>
                    @foreach($alluser as $alluser)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->department }}</td>
                        <td>{{ $user->acct_type }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->password }}</td>
                    </tr>
                    @endforeach
                   
                </tbody>
                
            </table>
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
