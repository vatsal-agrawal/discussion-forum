@extends('layouts.app')

@section('content')
        @foreach ($discussion as $item)
        <div class="panel panel-default">
                <div class="panel-heading"><img src="{{$item->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
                &nbsp;&nbsp;&nbsp;
                {{$item->user->name}} : <b>{{$item->user->points}}</b>
                
                <a href="{{route('discussions.show',['slug' => $item->slug])}}" class = "btn btn-primary pull-right">view</a>
               @if ($item->replies()->where('best_answer',1)->first())
                        <button class="btn btn-danger mx-auto" style="margin-right:10px">Closed Discussion</button>
               @else
                        <button class="btn btn-success mx-auto" style="margin-right:10px">Open Discussion</button>    
               @endif
                
                </div>

                <div class="panel-body">
                        <h3 class="text-center">
                                {{$item->title}}
                        </h3>
                        <p class="text-center">
                                {{str_limit($item->content,100)}}
                        </p>
                </div>
                <div class="panel-footer">
                        @if ($item->replies->count()==1 || $item->replies->count()==0)
                            {{$item->replies->count()}} Reply 
                            <a href = {{route('channel',['id' => $item->channel])}} class = "btn pull-right btn-info"> {{$item->channel->title}}</a>
                        @else
                            {{$item->replies->count()}}  Replies
                            <a href = {{route('channel',['id' => $item->channel])}} class = "btn pull-right btn-info"> {{$item->channel->title}}</a>                            
                        @endif
                </div>
            </div>
        @endforeach
        <div class = 'text-center'>{{$discussion->links()}} </div>
            
@endsection
