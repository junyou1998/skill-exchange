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
    <div class="row">
        <div class="form-group">
            <label for="">簽名</label>
            <input type="text" class="form-control" value="{{$user->profile->status}}">
        </div>
        <div class="form-group">
            <label for="">自我介紹</label>
            <input type="text" class="form-control" value="{{$user->profile->intro}}">
        </div>
        <div class="form-group">
            <label for="">網頁</label>
            <input type="text" class="form-control" value="{{$user->profile->website_link}}">
        </div>
    </div>
</div>
@endsection