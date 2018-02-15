<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Auth;

class ReplyController extends Controller
{
    public function like($id){
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()
        ]);
        return redirect()->back();
    }
    public function unlike($id){
        $like = Like::where('reply_id',$id)
                ->where('user_id',Auth::id())
                ->first();

        $like->delete();

        return redirect()->back();

    }
}
