<?php



namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $messages= Message::with('user')
        // ->where(['user_id'=> Auth::id(), 'receiver_id'=> $user->id])
        // ->orWhere(function($query) use($user){
        //     $query->where(['user_id' => $user->id, 'receiver_id' => Auth::id()]);
        // })
        // ->orderBy('created_at', 'asc')
        // ->get();

        $id = auth()->id();

        $inbox = DB::select('
            SELECT t1.*
            FROM messages AS t1
            INNER JOIN
            (
                SELECT
                    LEAST(user_id, receiver_id) AS user_id,
                    GREATEST(user_id, receiver_id) AS receiver_id,
                    MAX(id) AS max_id
                FROM messages
                GROUP BY
                    LEAST(user_id, receiver_id),
                    GREATEST(user_id, receiver_id)
            ) AS t2
                ON LEAST(t1.user_id, t1.receiver_id) = t2.user_id AND
                GREATEST(t1.user_id, t1.receiver_id) = t2.receiver_id AND
                t1.id = t2.max_id
                WHERE t1.user_id = ? OR t1.receiver_id = ?
            ', [$id, $id]);
        // $tttt = $inbox->join('users','message.user_id','=','users.user_id');
        // dd($tttt);

        $contacts = Message::where('user_id', Auth::id())->orWhere('receiver_id',Auth::id())->orderBy('created_at', 'asc')->get();
        // dd($contact);
        return view('frontend.chat.index',compact('contacts','inbox'));
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

        $id = auth()->id();

        $inbox = DB::select('
            SELECT t1.*
            FROM messages AS t1
            INNER JOIN
            (
                SELECT
                    LEAST(user_id, receiver_id) AS user_id,
                    GREATEST(user_id, receiver_id) AS receiver_id,
                    MAX(id) AS max_id
                FROM messages
                GROUP BY
                    LEAST(user_id, receiver_id),
                    GREATEST(user_id, receiver_id)
            ) AS t2
                ON LEAST(t1.user_id, t1.receiver_id) = t2.user_id AND
                GREATEST(t1.user_id, t1.receiver_id) = t2.receiver_id AND
                t1.id = t2.max_id
                WHERE t1.user_id = ? OR t1.receiver_id = ?
            ', [$id, $id]);
        // $tttt = $inbox->join('users','message.user_id','=','users.user_id');
        // dd($tttt);

        $contacts = Message::where('user_id', Auth::id())->orWhere('receiver_id',Auth::id())->orderBy('created_at', 'asc')->get();
        // dd($contact);
        return view('frontend.chat.show',compact('messages','user','contacts','inbox'));
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
