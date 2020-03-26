@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@endsection


@section('content')
<div class="container">
    <div class="sorts">
        <ul class="categories_sort col-12">
            <li>
                <a class="category_sort" href="/">
                    <i class="fas fa-globe-americas"></i>
<<<<<<< HEAD
                    <div class="text">全部(測試111)</div>
=======
                    <div class="text">全部</div>
>>>>>>> parent of 10858bb... ==
                </a>
            </li>
            @foreach ($categories as $key=>$category)
            
            <li>
                <a class="category_sort" href="/posts/category/{{$category->id}}">
                    <i class="fas fa-drum"></i>
                    <div class="text">{{$category->name}}</div>
                </a>
            </li>
            
            @endforeach
        </ul>
        <ul class="tags_sort col-12">
            熱門標籤 :
            @foreach ($tags as $key=>$tag)
            @if($key<15)
            <li>
                <a class="tag_sort" href="/posts/tag/{{$tag->id}}">#{{$tag->name}}</a>
            </li>
            @endif
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
                    <div class="row justify-content-center">
                        <a class="continue_reading" href="/posts/{{$post->id}}"><i class="fas fa-chevron-down"></i></a>
                    </div>

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
                            <a class="tag_link" href="/posts/tag/{{$tag->id}}">#{{$tag->name}}</a>
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