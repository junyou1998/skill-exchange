@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('/css/chat/show.css')}}">
@endsection
@section('content')
<div class="app">
    <section>
        <div class="container">
            <div class="row">
                <div class="side-lists col-3">
                    <h3>聊天室</h3>
                    <ul class="chat-lists">
    
                        @foreach ($inbox as $list)
                    <li id="@if($list->user_id == Auth::id())user_{{$list->receiver_id}}@else user_{{$list->user_id}}@endif" class="list">
                        <a class="chat-link" href="/chat/@if($list->user_id == Auth::id()){{$list->receiver_id}}@else{{$list->user_id}}@endif">
                                <div class="content">
                                    <div class="avatar">
                                        <div class="photo">
    
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="name">
                                            
                                        </div>
                                        <div class="msg">{{$list->content}}</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
    
                    </ul>
                </div>
                <div class="col-7 chat-room">
                    <div class="dialogue" id="messages">
                       
    
                </div>
                <div class="send">
                    <input type="text" id="message" name="content">
                    {{-- <textarea class="form-control" name=""cols="30" rows="2" id="message" name="content"></textarea> --}}
                    
                </div>
            </div>
            <div class="col-2">
                對方資訊
            </div>
        </div>
    </section>
</div>
</div>

@endsection

@section('js')
<script>
  
</script>
@endsection