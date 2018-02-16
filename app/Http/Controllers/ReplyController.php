<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Auth;
use Session;

class ReplyController extends Controller
{
    public function like($id){
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()
        ]);
        Session::flash('success','Thanks for liking');
        return redirect()->back();
    }
    public function unlike($id){
        $like = Like::where('reply_id',$id)
                ->where('user_id',Auth::id())
                ->first();

        $like->delete();

        return redirect()->back();

    }
    public function best_reply($id){
        $reply = Reply::findOrFail($id);
        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points +=75;
        $reply->user->save();

        return redirect()->back();
    }
}
