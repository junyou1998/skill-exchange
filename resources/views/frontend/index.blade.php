@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@endsection


@section('content')
<div class="container">
    <div class="tag-area">
        <ul class="tags col-12">
            <li>
                <a class="tag" href="/">
                    <i class="fas fa-globe-americas"></i>
                    <div class="text">全部</div>
                </a>
            </li>
            @foreach ($categories as $key=>$category)
            <li>
                <a class="tag" href="/posts/category/{{$category->id}}">
                    <i class="fas fa-drum"></i>
                    <div class="text">{{$category->name}}</div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="cards row">
        @foreach ($posts as $post)
        <div class="col-6">
            <div class="card">
                <div class="head">
                    <div class="user">
                        <div class="avatar"></div>
                        <div class="username">
                            {{$post->user->name}}
                            <div class="job">
                                {{$post->region}}
                            </div>
                        </div>
                    </div>
                    <div class="time">
                        11小時前
                    </div>
                    <div class="love">
                        <div class="love-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
                <div class="content">
                    {{-- 地區:
                    <p>{{$post->region}}</p> --}}
                    <div class="skill">
                        我擅長
                        <span class="highlight">
                            {{$post->skill}}
                        </span>
                    </div>
                    <div class="learn">
                        想交換
                        <span class="highlight">
                            {{$post->learn}}
                        </span>
                    </div>
                    <p>{{ Str::limit($post->description,100)}}</p>

                    <a href="/posts/{{$post->id}}">繼續閱讀</a>
                </div>
                <div class="foot">
                    <div class="sort">
                        <div class="category">
                            @if(isset($post->category))
                            <a class="category-tag"
                                href="/posts/category/{{$post->category_id}}">{{$post->category->name}}</a>
                            @else
                            未分類
                            @endif
                        </div>
                        <div class="tag_label">
                            @foreach ($post->tags as $tag)
                            #{{$tag->name}}
                            @endforeach
                        </div>
                    </div>

                    <div class="contact">
                        <i class="fab fa-telegram-plane"></i>
                        傳訊
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

</div>

@endsection

@section('js')

<script>
    $('.fa-heart').click(function(){
        $(this).toggleClass('loved')
    })
</script>
@endsection