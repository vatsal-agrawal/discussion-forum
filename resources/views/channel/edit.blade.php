@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('channels.update',['channel' => $channel->id])}}" method = 'Post'>
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="text">Edit a new Channel:</label>
                          <input type="text" class="form-control" id="text" value= "{{$channel->title}}" name = 'title'>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>    




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
