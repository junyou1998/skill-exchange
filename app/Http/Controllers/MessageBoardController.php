<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageBoard;
use App\Events\MessageBoardSent;
class MessageBoardController extends Controller
{
    public function index(){
        $messages = MessageBoard::all();
        return view('frontend.message_board.index',compact('messages'));
    }

    public function store(Request $request){
        $message = new MessageBoard;

        $message->content = $request->content;
        $message->name = $request->name;

        $message->save();
    
        broadcast(new MessageBoardSent($message,'dsajfl'));
    }
}
