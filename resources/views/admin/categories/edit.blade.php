@extends('layouts.admin')

@section('content')
    <div class="container card">
    <form action="/admin/categories/{{$category->id}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="category">分類</label>
            <input id="category" type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="sent">
            </div>
        </form>
    </div>
@endsection