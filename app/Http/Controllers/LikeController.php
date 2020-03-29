<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request,$post){
        $like = new Like;
        $like->user_id = Auth::id();
        $like->post_id = $post;
        $like->save();
    }

    public function destroy(Request $request,$post){
        $like = Like::where([['user_id',Auth::id()],['post_id',$post]]);
        $like->delete();
    }
}
