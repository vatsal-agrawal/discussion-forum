@extends('layouts.app')

@section('content')

<div class="panel panel-default">
        <div class="panel-heading"><img src="{{$item->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
        &nbsp;&nbsp;&nbsp;
        {{$item->user->name}}
        
        
        
        </div>

        <div class="panel-body">
                <h3 class="text-center">
                        {{$item->title}}
                </h3>
                <p class="text-center">
                        {{$item->content}}
                </p>
        </div>
        <div class="panel-footer">
               LIKE
        </div>
    </div>

@foreach ($item->replies as $r)

<div class="panel panel-default">
        <div class="panel-heading"><img src="{{$r->user->avatar}}" width="40px" height = "40px" alt = "image not found"> 
        &nbsp;&nbsp;&nbsp;
        {{$r->user->name}}
        
        
        
        </div>

        <div class="panel-body">
                <p class="text-center">
                        {{$r->content}}
                </p>
        </div>
        <div class="panel-footer">
               LIKE
        </div>
    </div>


    
@endforeach
@endsection