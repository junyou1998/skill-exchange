@extends('layouts.app')

@section('css')

@endsection

@section('content')
這是留言板


<ul id="message">
    @foreach ($messages as $message)
    <li>{{$message->name}}:{{$message->content}}</li>
    @endforeach
</ul>
<label for="name">留言者</label>
<input type="text" id="name">
<label for="content">內容</label>
<input type="text" id="content">
<button id="sent_btn" onclick="send()">送出</button>
@endsection

@section('js')
<script>
    function send(){
    console.log('work!')
    window.axios.post('/message_board',{
            name: document.querySelector('#name').value,
            content: document.querySelector('#content').value,
        });
}
    
Echo.channel('message_board')
    .listen('MessageBoardSent',(e)=>{
        console.log(e)

        let element = document.createElement('li');
        
        element.innerText = `${e.message.name} : ${e.message.content}`;
        document.querySelector('#message').appendChild(element);
    })
</script>
@endsection