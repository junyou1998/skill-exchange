@extends('layouts.app')
@section('css')
    <style>
        .avatar-img {
            width: 100px;
            height: 100px;
        }
    </style>
@section('content')


<div class="container">
    <div class="row">
        
        <div class="avatar col-3">
            <img class="avatar-img" src="{{$user->profile->avatar_url ?? 'https://cdn3.iconfinder.com/data/icons/flat-ui/500/21-512.png'}}" alt="">
        </div>
        <div class="col-9">
        <h1>{{$user->name ?? '無名氏'}}</h1>
        <p>{{$user->profile->status ?? '這人很懶'}}</p>
        <p>{{$user->profile->intro ?? '這人很懶'}}</p>
        <a href="{{$user->profile->website_link ?? '這人很懶'}}">網頁</a>
        </div>
    <a href="/profile/{{$user->id}}/edit" class="btn btn-primary">編輯</a>
    </div>
</div>
@endsection