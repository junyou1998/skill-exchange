@extends('layouts.admin')
@section('content')

<div class="container">
    {{-- <a href="/posts/create" class="btn btn-primary">create post</a> --}}
    @foreach ($posts as $post)
    <div class="card p-3">
        地區:
        <p>{{$post->region}}</p>
        我會:
        <p>{{$post->skill }}</p>
        想學:
        <p>{{$post->learn}}</p>
        說明內容:
        <p>{{$post->description}}</p>
        <a href="/posts/{{$post->id}}">繼續閱讀</a>
        分類:
        @if(isset($post->category))
        {{$post->category->name}}
        @else
        未分類
        @endif
    {{-- <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">編輯</a> --}}
        <button class="btn btn-danger" onclick="deletePostByAdmin({{$post->id}})">刪除</button>
    </div>
@endforeach
</div>

@endsection
@section('js')
<script>

</script>
@endsection