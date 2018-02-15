@extends('layouts.app')

@section('content')

<div class="panel panel-default">
        <div class="panel-heading"><img src="{{$item->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
        &nbsp;&nbsp;&nbsp;
        {{$item->user->name }} : <b>{{$item->created_at->diffForHumans()}}</b>
        
        
        
        </div>

        <div class="panel-body">
                <h3 class="text-center">
                        {{$item->title}}
                </h3>
                <p class="text-center">
                        {{$item->content}}
                </p>
        </div>
    </div>

@foreach ($item->replies as $r)

<div class="panel panel-default">
        <div class="panel-heading"><img src="{{$r->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
        &nbsp;&nbsp;&nbsp;
        {{$r->user->name}} : <b>{{$item->created_at->diffForHumans()}}</b>
        
        
        
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