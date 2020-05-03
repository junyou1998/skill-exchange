<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function sender() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function recipient() {
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
