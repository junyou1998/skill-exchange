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
        // // $like->fill($request->all());
        $like->user_id = Auth::id();
        $like->post_id = $post;

        $like->save();
        // dd($post);
    }
}
