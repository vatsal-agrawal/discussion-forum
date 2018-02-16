@extends('layouts.app')

@section('content')

<div class="panel panel-default">
        <div class="panel-heading"><img src="{{$item->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
        &nbsp;&nbsp;&nbsp;
        {{$item->user->name }} : <b>{{$item->user->points}}</b>
        @if (Auth::check())

                @if ($item->is_being_watched_by_user())
                        <a href ="{{route('discussions.unwatch',['id' => $item->id])}}" class = 'btn btn-default pull-right'>Unwatch</a>
                @else
                        <a href ="{{route('discussions.watch',['id' => $item->id])}}" class = 'btn btn-default pull-right'>Watch</a>    
                @endif
        @endif
        </div>

        <div class="panel-body">
                <h3 class="text-center">
                        {{$item->title}}
                </h3>
                <p class="text-center">
                        {{$item->content}}
                </p>
                <hr>
                @if ($best_answer)
                
                <div class='panel panel-success'>
                                <div class="panel-heading"><img src="{{$best_answer->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
                                        &nbsp;&nbsp;&nbsp;
                                        {{$best_answer->user->name}} : <b>{{$best_answer->user->points}}</b>
                                </div>     
                                <div class="panel-body">
                                        <p class="text-center">
                                                {{$best_answer->content}}
                                        </p>
                                </div>
                        </div>          
                @endif
                        

        </div>
    </div>

@foreach ($item->replies as $r)


<div class="panel panel-default">
        <div class="panel-heading"><img src="{{$r->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
        &nbsp;&nbsp;&nbsp;
        {{$r->user->name}} : <b>{{$r->user->points}}</b>
        @if (!$best_answer)
        @if (Auth::id() == $item->user_id)
        <a href ="{{route('discussions.best.reply',['id' => $r->id])}}" class = "btn btn-xs btn-info pull-right">Mark this as best answer</a>
        @endif
        @endif
        </div>
      

        <div class="panel-body">
                <p class="text-center">
                        {{$r->content}}
                </p>
        </div>
        <div class="panel-footer">
                @if ($r->is_liked_by_auth_user())
                    <a href = "{{route('reply.unlike',['id' => $r->id])}}" class = 'btn btn-danger'>Unlike <span class = 'badge'> {{$r->likes->count()}}</span></a>
                @else
                    <a href = "{{route('reply.like',['id' => $r->id])}}" class = 'btn btn-success'>Like <span class = 'badge'> {{$r->likes->count()}}</span></a>
                @endif
        </div>
    </div>


    
@endforeach

<div class="panel panel-default">
        <div class="panel-body">
                @if (Auth::check())
                <form action="{{route('discussions.reply',['id' => $item->id])}}" method = 'POST'>
                                {{csrf_field()}}           
                                <div class="form-group">
                                    <label for="text">Write Something Here..</label>
                                    <textarea rows = '10' cols = '30' type="text" class="form-control" id="text" name = 'content'></textarea>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                 </form> 
                @else
                    <h1 class = "text-center">Sign In Please To Leave A Reply</h1>
                @endif
                   
        </div>
    </div>






@endsection