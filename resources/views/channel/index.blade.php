@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channels</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($channels as $item)
                                 <tr>
                                    <td>{{$item->title}}</td>
                                    <td><a href= "{{route('channels.edit',['channel'=>$item->id])}}" class="btn btn-info" role="button">Edit</a></td>
                                    <td>    <form action="{{route('channels.destroy',['channel' => $item->id])}}" method = 'Post'>
                                            {{csrf_field()}}
                                            {{method_field('Delete')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>   </td>
                                  </tr>
                            @endforeach

                          </tbody>
                        </table>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



