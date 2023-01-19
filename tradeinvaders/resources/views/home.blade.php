@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <div class=""></div>asd
        </div>
        <div class="col-9 p-5">
            <div class="d-flex align-items-center pb-4">
                <h1>{{ Auth::user()->username }}</h1>
            </div> 
            <div class="d-flex">
                <div class="pr-3"><strong>127k</strong>&nbspPost</div>
                <div class="pr-3"><strong>24k</strong>&nbspFollowers</div>
                <div class="pr-3"><strong>300</strong>&nbspFollowing</div>
            </div>
            <div class="pt-4 font-weight: bold">Jovenil Medina</div>
            <div class="div">{{ Auth::user()->address }}</div>
            <div class="div">jovenilmedina.com</div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="/img/post1.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/post3.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/post4.jpg" class="w-100">
        </div>
    </div>
</div>
@endsection
