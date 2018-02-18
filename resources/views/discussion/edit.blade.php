@extends('layouts.app')

@section('content')

            <div class="panel panel-default">

                    <form action="{{route('discussions.update',[$discussion->id])}}" method = 'POST'>
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        
                       
                        <div class="form-group">
                            <label for="text">Write Something Here..</label>
                            <textarea rows = '10' cols = '30' type="text" class="form-control" id="text" name = 'content'>{{$discussion->content}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>    




                </div>

@endsection
