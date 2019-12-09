@extends('layouts.app')
@section('css')
<style>
    .avatar-img {
        width: 100px;
        height: 100px;
    }
</style>
@endsection
@section('content')


<div class="container">
    <div class="">
        <div class="form-group">
            <label for="">簽名</label>
            <input type="text" class="form-control" value="{{$user->username}}" readonly>
        </div>
        <div class="form-group">
            <label for="">簽名</label>
            <input type="text" class="form-control" value="{{$user->profile->status ?? '尚未填寫'}}">
        </div>
        <div class="form-group">
            <label for="">自我介紹</label>
            <input type="text" class="form-control" value="{{$user->profile->intro ?? '尚未填寫'}}">
        </div>
        <div class="form-group">
            <label for="">網頁</label>
            <input type="text" class="form-control" value="{{$user->profile->website_link ?? '尚未填寫'}}">
        </div>
        <div class="form-group">
            <label for="">頭貼</label>
            <input type="file" class="form-control" value="{{$user->profile->website_link ?? '尚未填寫'}}">
        </div>
    </div>
</div>
@endsection