@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/logo.png" style="height: 120px;">
        </div>
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>238</strong> posts</div>
                <div class="pr-5"><strong>15k</strong> followers</div>
                <div class="pr-5"><strong>0</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url  }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="/svg/insta-1.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/svg/insta-2.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/svg/insta-3.jpg" class="w-100">
        </div>
    </div>
</div>
@endsection