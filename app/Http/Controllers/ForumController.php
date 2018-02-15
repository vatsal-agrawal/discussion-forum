<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;

class ForumController extends Controller
{
    public function index(){
        return view('forum',['discussion' => Discussion::orderBy('created_at','dsc')->paginate(3)]);
    }
    public function channel($id){
        $channel = Channel::findOrFail($id);
        return view('channel')->with('discussion', $channel->discussions);
    }
}
