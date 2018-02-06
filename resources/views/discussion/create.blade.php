@extends('layouts.app')

@section('content')

            <div class="panel panel-default">

                    <form action="{{route('discussions.store')}}" method = 'POST'>
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="text">Create a new Discussion:</label>
                          <input type="text" class="form-control" id="text" name = 'title'>
                        </div>
                        <div class="form-group">
                        <label for="text">Select list:</label>
                            <select class="form-control" name = "channel" id="text">
                                @foreach ($channels as $item)
                                <option value ="{{$item->id}}" >{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">Write Something Here..</label>
                            <textarea rows = '10' cols = '30' type="text" class="form-control" id="text" name = 'content'></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>    




                </div>

@endsection
