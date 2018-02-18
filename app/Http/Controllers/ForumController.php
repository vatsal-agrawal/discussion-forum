<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Discussion;
use App\Channel;
use Auth;

class ForumController extends Controller
{
    public function index(){
        switch (request('filter')) {
            case 'me':
                // dd(Discussion::where('user_id',Auth::id())->paginate(3));
                return view('forum',['discussion' => Discussion::where('user_id',Auth::id())->paginate(3)]);                
                break;

            case 'answered':
                $ans = array();
                foreach (Discussion::all() as $discuss) {
                    if($discuss->replies()->where('best_answer',1)->first()){
                        array_push($ans, $discuss);
                    }   
                }
                return view('forum',['discussion' => new Paginator($ans,3)]);                                
                break;

            case 'unanswered':
                $ans = array();
                foreach (Discussion::all() as $discuss) {
                    if($discuss->replies()->where('best_answer',0)->first()){
                        array_push($ans, $discuss);
                    }   
                }
                return view('forum',['discussion' => new Paginator($ans,3)]); 
                    break;
            
            default:
                return view('forum',['discussion' => Discussion::orderBy('created_at','dsc')->paginate(3)]);
                break;
        }
        
    }
    public function channel($id){
        $channel = Channel::findOrFail($id);
        return view('channel')->with('discussion', $channel->discussions);
    }
}
