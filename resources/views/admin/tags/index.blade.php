@extends('layouts.admin')
@section('content')

<div class="container">
    @foreach ($tags as $tag)
    <div class="card p-3">
        {{$tag->name}}
        <button class="btn btn-danger" onclick="deleteTag({{$tag->id}})">刪除</button>
    </div>
@endforeach
</div>

@endsection
@section('js')
<script>

</script>
@endsection