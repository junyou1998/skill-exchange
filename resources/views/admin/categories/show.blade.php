@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card p-3">
        <p>{{$post->region}}</p>
        <p>{{$post->skill}}</p>
        <p>{{$post->learn}}</p>
        <p>{{$post->description}}</p>
    </div>

</div>
@endsection