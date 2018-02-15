@extends('layouts.app')

@section('content')
        @foreach ($discussion as $item)
        <div class="panel panel-default">
                <div class="panel-heading"><img src="{{$item->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
                &nbsp;&nbsp;&nbsp;
                {{$item->user->name}} : <b>{{$item->created_at->diffForHumans()}}</b>
                
                <a href="{{route('discussions.show',['slug' => $item->slug])}}" class = "btn btn-primary pull-right">view</a>
                
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
                        @else
                            {{$item->replies->count()}}  Replies
                        @endif
                </div>
            </div>
        @endforeach
        <div class = 'text-center'>{{$discussion->links()}} </div>
            
@endsection
