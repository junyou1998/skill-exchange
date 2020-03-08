@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-3">
        地區:
        <p>{{$post->region}}</p>
        我會:
        <p>{{$post->skill}}</p>
        想學:
        <p>{{$post->learn}}</p>
        說明:
        <p>{{$post->description}}</p>
        分類:
        @if(isset($post->category))
        <p>{{$post->category->name}}</p>
        @else
        未分類
        @endif
    </div>

</div>
@endsection