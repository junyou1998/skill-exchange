@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('/css/chat/show.css')}}">
@endsection
@section('content')
<div class="app">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-none">
                好友列表
            </div>
            <div class="col-lg-8 col-12">
                <div class="dialogue" id="messages">
                    @foreach ($messages as $message)
                    <div class="message @if($message->user->id == Auth::id())local @else remote @endif">
                        <div class="avatar">
                            <div class="photo">

                            </div>
                            {{-- <div class="name">{{$message->user->name}}</div> --}}
                        </div>
                        <div class="msg">{{$message->content}}</div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="send">
                    <textarea class="form-control" name=""cols="30" rows="2" id="message" name="content"></textarea>
                    <button id="send" type="submit" onclick="send({{$user->id}})">送出</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    
    <div class="row">
        <div class="col-4">
            <h4>聊天列表</h4>
            <ul>
                @foreach ($contacts as $contact)
                @if($contact->user_id == Auth::id())
                    <li>
                        {{$contact->receiver_id}}
                    </li>
                @else
                    <li>
                        {{$contact->user_id}}
                    </li>
                @endif
                @endforeach
                
            </ul>
        </div>
        <div class="col-8">
        <h3>{{$user->name}}</h3>
            <ul id="messages">
                @foreach ($messages as $message)
                <li>{{$message->content}}</li>
                @endforeach
            </ul>
            <input id="message" class="form-control" type="text" name="content">
            <button id="send" type="submit" onclick="send({{$user->id}})">送出</button>
        </div>
    </div>
    
</div> --}}
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
        // let element = document.createElement('li')
        //     element.innerText = messageElement.value;
        //     element.classList.add('text-primary');

        //     messagesElement.appendChild(element);

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


        // var objDiv = document.getElementById("your_div");
        messagesElement.scrollTop = messagesElement.scrollHeight;
}

    
    
Echo.private('chat.{{ auth()->user()->id }}')
    .listen('MessageSent',(e)=>{
        console.log(e)

        // let element = document.createElement('li')

        // element.innerText = e.message.content;
        // element.classList.add('text-success');

        // messagesElement.appendChild(element);


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
    })
</script>
@endsection