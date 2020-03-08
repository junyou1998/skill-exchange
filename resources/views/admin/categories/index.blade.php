@extends('layouts.admin')
@section('content')

<div class="container">
    <a href="/admin/categories/create" class="btn btn-primary">create category</a>
    @foreach ($categories as $category)
    <div class="card p-3">
        {{$category->name}}
    <a class="btn btn-primary" href="/admin/categories/{{$category->id}}/edit">編輯</a>
        <button class="btn btn-danger" onclick="deleteCategory({{$category->id}})">刪除</button>
    </div>
@endforeach
</div>

@endsection
@section('js')
<script>

</script>
@endsection