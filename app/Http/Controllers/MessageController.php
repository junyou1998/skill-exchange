<?php



namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        $message = new Message;

        $message->content = $request->message;
        $message->user_id = Auth::id();
        $message->receiver_id = $user->id;

        $message->save();

        broadcast(new MessageSent($message->load('user'),"goodddd"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $messages= Message::with('user')
        ->where(['user_id'=> Auth::id(), 'receiver_id'=> $user->id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'receiver_id' => Auth::id()]);
        })
        ->orderBy('created_at', 'asc')
        ->get();

        $contacts = Message::where('user_id', Auth::id())->orWhere('receiver_id',Auth::id())->orderBy('created_at', 'asc')->get();
        // dd($contact);
        return view('frontend.chat.show',compact('messages','user','contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
