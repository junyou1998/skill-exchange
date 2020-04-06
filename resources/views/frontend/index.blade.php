@extends('layouts.app')

@section('css')
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 side-nav">
            <div class="navigation">
                <div class="avator">
                    <img src="https://picsum.photos/id/55/80/80" alt="">
                </div>
                @guest
                <div class="unlogin">
                    <a href="{{ route('login') }}">登入</a>
                /
                @if (Route::has('register'))
                <a href="{{ route('register') }}">註冊</a>
                @endif
                </div>
                
                @else
                <div class="name">{{ Auth::user()->name }}</div>
                @endguest
                <ul class="page-list">
                    <li><a class="active" href="/"><i class='bx bxs-home'></i>首頁</a></li>
                    @guest
                    @else
                    <li><a href=""><i class='bx bx-border-all'></i>我的貼文</a></li>
                    <li><a href=""><i class='bx bxs-pin'></i>收藏貼文</a></li>
                    <li><a href=""><i class='bx bxs-info-circle'></i>個人資料</a></li>
                    <li><a href=""><i class='bx bxs-message'></i>訊息</a></li>
                    @endguest
                </ul>
                @guest
                @else
                
                <div class="logout">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out'></i> 登出
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                
                @endguest
            </div>
        </div>
        <div class="col-9">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/id/101/1140/300" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/id/232/1140/300" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/id/210/1140/300" alt="">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="categories">
                <div class="swiper-container1 category-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="/" class="active">
                                <i class='bx bx-world'></i>
                                <div>全部</div>
                            </a>
                        </div>
                        @foreach ($categories as $key=>$category)
                        <div class="swiper-slide">
                            <a href="/posts/category/{{$category->id}}">
                                <i class='bx bx-code-block'></i>
                                <div>{{$category->name}}</div>
                            </a>
                        </div>
                        @endforeach
                        <div class="swiper-slide"><a href="">其他選項1</a></div>
                        <div class="swiper-slide"><a href="">其他選項2</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 hot">
                    熱門關鍵字
                    @foreach ($tags as $key=>$tag)
                    @if($key<15) <a class="tag" href="/posts/tag/{{$tag->id}}"># {{$tag->name}}</a>
                        @endif
                        @endforeach
                </div>
                <div class="col-12 ">
                    <div class="search">
                        <input type="text" placeholder="搜尋標籤...(尚無此功能)">
                        <i class='bx bx-search-alt'></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 posts">
                    @foreach ($posts as $post)
                    <div class="post">
                        <div class="head">
                            <div class="avator">
                                <img src="https://picsum.photos/id/219/100/100" alt="">
                            </div>
                            <div class="name">{{$post->user->name}}<div class="area">{{$post->region}}</div>
                            </div>
                            <div class="time">5hr</div>
                            <div class="hearrt">
                                @if (Auth::check())
                                <i id="love_{{$post->id}}"
                                    class="fas heart fa-heart @if($post->likes->count()>0)loved @endif()"
                                    onclick="Like({{$post->id}})"></i>
                                @else
                                <i class="fas fa-heart" onclick="return alert('登入後才能加愛心喔~')"></i>
                                @endif
                                <span id="like_{{$post->id}}">{{$post->likes_count}}</span>
                            </div>
                        </div>
                        <div class="tags">
                            @foreach ($post->tags as $tag)
                            <a class="tag" href="/posts/tag/{{$tag->id}}"># {{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="content">
                            <div class="skill">
                                <span class="title">我擅長</span>
                                <span>{{$post->skill}}</span>
                            </div>
                            <div class="learn">
                                <span class="title">想交換</span>
                                <span>{{$post->learn}}</span>
                            </div>
                            <p>{{ Str::limit($post->description,100)}}</p>
                            <a class="row continue-reading" href="/posts/{{$post->id}}">
                                閱讀全文
                            </a>
                        </div>
                        <div class="function">
                            @if(isset($post->category))
                            <a href="/posts/category/{{$post->category_id}} "
                                class="category-sort">{{$post->category->name}}</a>
                            @else
                            未分類
                            @endif
                            <a href="" class="send-btn"><i class='bx bx-send'></i> 傳訊</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-2 ad">這個部分可以放廣告</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

<script>
    $('.heart').click(function(){
        $(this).toggleClass('loved')
    })
    var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
        var swiper1 = new Swiper('.swiper-container1', {
            slidesPerView: 7,
            spaceBetween: 0,
            slidesPerGroup: 9,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
</script>
@endsection