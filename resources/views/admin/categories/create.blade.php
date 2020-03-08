@extends('layouts.admin')

@section('content')
    <div class="container card">
        <form action="/admin/categories" method="post">
            @csrf
            <div class="form-group">
                <label for="category">分類</label>
                <input id="category" type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="sent">
            </div>
        </form>
    </div>
@endsection