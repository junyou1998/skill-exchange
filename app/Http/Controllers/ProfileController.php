<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    public function index($user_id){
        $user = User::findOrFail($user_id);
        return view('profile.index',compact('user'));
    }
    public function edit($user_id){
        $user = User::findOrFail($user_id);
        return view('profile.edit',compact('user'));
    }
    
}
