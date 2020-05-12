<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['region','skill','learn','description','category_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function tagsString(){
        $tagsName = [];

        foreach($this->tags as $key => $tag){
            $tagsName[] = $tag->name;
        }

        $tagsString = implode(',',$tagsName);
        
        return $tagsString;
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function getCreatedAtAttribute($date) {
        if (Carbon::now() > Carbon::parse($date)->addDays(15)) {
            return Carbon::parse($date);
        }
    
        return Carbon::parse($date)->diffForHumans();
    }
}
