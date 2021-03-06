<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewReplyAdded;
use App\Discussion;
use App\User;
use Auth;
use App\Reply;
use Notification;


class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'channel' => 'required',
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'content'=> $request->content,
            'channel_id'=> $request->channel,
            'user_id' => Auth::user()->id,
            'slug' => str_slug($request->title)
        ]);

        return redirect()->route('discussions.show', ['slug' => $discussion->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion = Discussion::where('slug',$slug)->first();
        if($discussion){
            $best_answer = $discussion->replies()->where('best_answer',1)->first();
             return view('discussion.show')->with('item',$discussion)->with('best_answer',$best_answer);            
        }
        else{
            return view('discussion.show')->with('item',$discussion);                        
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('discussion.edit')->with('discussion',Discussion::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discussion = Discussion::findorfail($id);
        $discussion->update($request->all());
        return redirect()->route('discussions.show',['slug'=>$discussion->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply($id){
        $reply = Reply::create([
                    'user_id' => Auth::id(),
                    'discussion_id' => $id,
                    'content' => request()->content,
                ]);

        $reply->user->points += 25;

        $reply->user->save();

        $d = Discussion::findOrFail($id);
        $watchers = array();

        foreach($d->watchers as $w){
            array_push($watchers,User::findOrFail($w->user_id));
        }

        Notification::send($watchers,new NewReplyAdded());

        return redirect()->back();
    }
}
