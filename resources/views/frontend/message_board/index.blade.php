@extends('layouts.temp')

@section('css')
<style>
    #message {
        position: relative;
        display: flex;
        padding: 0 50px;
        flex-wrap: wrap;
        /* animation: slide 20s linear infinite; */
    }
    .description{
        padding: 20px 50px;
        font-size: 28px;
        color: #555555;
    }
    .block {
        display: inline-block;
        padding: 10px 20px;
        font-size: 18px;
        background-color: rgb(253, 253, 253);
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(1, 222, 211, .3);
        margin: 0px 20px 20px 0;
        transition: .3s;
        min-width: 100px;

    }

    #text {
        display: inline-block;
        margin-top: 200px;
        position: relative;
        font-size: 12rem;
        font-weight: 900;
        line-height: 0.9rem;
        letter-spacing: 2px;
        /* text-align: center; */
        margin: 100px 0 200px 0;

        transform: rotate(-10deg) skew(20deg)
    }

    #text:before {
        content: attr(data-text);
        position: absolute;
        top: 30px;
        left: -30px;
        color: rgba(0, 94, 90, .8);
        text-shadow: none;
        filter: blur(20px);
        z-index: -1;
    }

    .input {
        display: inline-block;
    }

    .head {
        display: flex;
        justify-content: space-around
    }

    .input {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;

    }
    span{
        box-shadow: inset 0 -10px 0 #01ded3;
        
    }
    .input input {
        margin: 0 20px 0 10px;
        height: 50px;
        border-radius: 8px;
        border: none;
        /* border-color: rgba(126, 239, 104, 0.8); */
        box-shadow: 0 0 2px 5px rgba(0, 0, 0, 0.1);
        outline: none;
        padding: 0 10px;
        transition: .3s;
        font-size: 28px;
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 2px 5px rgba(1, 222, 211, 1);
    }

    label {
        font-size: 40px;
        font-weight: 700;
    }

    @keyframes slide {
        from {
            left: 100vw;
        }

        to {
            left: 0;
        }
    }
</style>
@endsection
@section('content')
<div class="head">
    <div id="text" data-text="留言者">留言板</div>
    
    <div class="input">
        <label for="name">留言者:</label>
        <input type="text" id="name" list="role" autocomplete="off">
        <datalist id="role">
            <option value="路人">
        </datalist>
        <label for="content">內容:</label>
        <input type="text" id="content" autocomplete="off">
        <button id="sent_btn" onclick="send()">送出</button>
    </div>
</div>
<div class="description">
    哈囉~我們是<span>因緣技會</span>，我們知道還有很多不足的地方，也正積極地克服中，想打造一個好用的<span>技能交換平台</span>，如果對我們的展覽有什麼<span>建議</span>都希望能不吝在此留言，想說什麼都可以~也可以寫個<span>鼓勵</span>的話呦~
</div>
<div id="message">
    @foreach ($messages as $message)
    <div class="block">{{$message->name}}:{{$message->content}}</div>
    @endforeach
</div>
@endsection
@section('js')
<script>
    function send(){
        
        if(document.querySelector('#name').value != "" && document.querySelector('#content').value!=0){
            console.log('work!')
    window.axios.post('/message_board',{
            name: document.querySelector('#name').value,
            content: document.querySelector('#content').value,
        });
        }
        else{
            window.alert("記得填寫完整內容喔~")
        }
        document.querySelector('#name').value = ""
        document.querySelector('#content').value = ""
    
}
    
Echo.channel('message_board')
    .listen('MessageBoardSent',(e)=>{
        console.log(e)
        $('#message').append(`<div class="block">${e.message.name} : ${e.message.content}</div>`)
    })
</script>
<script>
    var text = document.getElementById('text')
    var shadow = ""

    for(var i=0; i <30; i++){
        // console.log(i)
        shadow +=(shadow? ',':'')+ -i*1 +'px ' + i*1+'px 0 #01ded3';
        console.log(shadow)
        text.style.textShadow = shadow;
    }
</script>
@endsection