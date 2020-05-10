@extends('layouts.app')

@section('content')
    <div class="container card">
    <form action="/posts/{{$post->id}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="region">地點</label>
            <input id="region" type="text" class="form-control" name="region" value="{{$post->region}}">
            </div>
            <div class="form-group">
                <label for="skill">我擅長</label>
            <input id="skill" type="text" class="form-control" name="skill" value="{{$post->skill}}">
            </div>
            <div class="form-group">
                <label for="learn">想交換</label>
                <input id="learn" type="text" class="form-control" name="learn" value="{{$post->learn}}">
            </div>
            <div class="form-group">
                <label for="description">說明</label>
                <textarea class="form-control" name="description" id="description" cols="20" rows="5">{{$post->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="category">分類</label>
                <select class="form-control" name="category_id" id="category">
                    <option selected value>請選擇一個分類</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if($post->category_id==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="tags">標籤(請用英文逗點分開每個標籤)</label>
            <input class="form-control" type="text" name="tags" id="tags" value="{{$post->tagsString()}}">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="sent">
            </div>
        </form>
    </div>
@endsection