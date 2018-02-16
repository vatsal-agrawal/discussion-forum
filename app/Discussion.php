<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable = ['user_id','channel_id','title','content','slug'];

    public function channel(){
        return $this->belongsTo('App\Channel');
    }
    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function watchers(){
        return $this->hasMany('App\Watcher');
    }
    public function is_being_watched_by_user(){
        $id = Auth::id();

        $watches = array();

        foreach($this->watchers as $w){
            array_push($watches,$w->user_id);
        }
        if(in_array($id,$watches)){
            return true;
        }
        else{
            return false;
        }
    }
}
