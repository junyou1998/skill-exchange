@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('/css/chat/show.css')}}">
@endsection
@section('content')
<div class="app">
    <div class="container">
        <div class="row">
            <div class="side-lists col-3">
                <h3>聊天室</h3>
                <ul class="chat-lists">

                    @foreach ($inbox as $list)
                    <li class="list @if($user->id == $list->user_id OR $user->id == $list->receiver_id) active @endif">
                    <a href="/chat/@if($list->user_id == Auth::id()){{$list->receiver_id}}@else{{$list->user_id}}@endif">
                            <div class="content">
                                <div class="avatar">
                                    <div class="photo">

                                    </div>
                                </div>
                                <div class="info">
                                    <div class="name">
                                        @if($list->user_id == Auth::id()){{$user::find($list->receiver_id)->name}}
                                        @else{{$user::find($list->user_id)->name}}
                                        @endif
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
                    我是:{{Auth::id()}}在跟{{$user->id}}聊天
                    @foreach ($messages as $message)
                    <div class="message @if($message->user->id == Auth::id())local @else remote @endif">
                        <div class="avatar">
                            <div class="photo">

                            </div>
                            {{-- <div class="name">{{$message->user->name}}
                        </div> --}}
                    </div>
                    <div class="msg">{{$message->content}}</div>
                </div>
                @endforeach

            </div>
            <div class="send">
                <input type="text" id="message" name="content">
                {{-- <textarea class="form-control" name=""cols="30" rows="2" id="message" name="content"></textarea> --}}
                <button id="send" type="submit" onclick="send({{$user->id}})">送出</button>
            </div>
        </div>
        <div class="col-2">
            對方資訊
        </div>
    </div>
</div>
</div>

@endsection

@section('js')
<script>
    const sendElement = document.getElementById('send');
const messageElement = document.getElementById('message');

const messagesElement = document.getElementById('messages');
messagesElement.scrollTop = messagesElement.scrollHeight;

function send(user){
    console.log('work!')

    window.axios.post('/chat/'+user,{
            message: messageElement.value,
        });

        messagesElement.innerHTML += 
        `
        <div class="message local">
            <div class="avatar">
                <div class="photo">

                </div>
            </div>
            <div class="msg">${messageElement.value}</div>
        </div>
        `
        messageElement.value = "";


        messagesElement.scrollTop = messagesElement.scrollHeight;
}

    
    
Echo.private('chat.{{ auth()->user()->id }}')
    .listen('MessageSent',(e)=>{
        console.log(e)
        // console.log({{auth()->user()->id}})
        var person = {{$user->id}}
        // console.log(`這是來自${e.message.user_id}的訊息` + {{$user->id}})

        if(e.message.user_id != person){
            console.log('有其他人想跟你講話')
        }
        else{
            messagesElement.innerHTML += 
            `
            <div class="message remote">
                <div class="avatar">
                    <div class="photo">

                    </div>
                </div>
                <div class="msg">${e.message.content}</div>
            </div>
            `
        }
        
    })
</script>
@endsection