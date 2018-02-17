
            <div class="panel panel-default">

                    <div class="panel-body">
                                <a href="{{route('forum')}}" class = "text-center">Forum</a>
                    </div>
                    <div class="panel-body">
                        <a href="{{route('discussions.my')}}" class = "text-center">My Discussions</a>
                    </div>
            </div>
            
            
            
            <div class="panel panel-default">
                <div class="panel-heading">Channels</div>

                <div class="panel-body">
                     <ul class="list-group">       
                        @foreach ($channels as $item)
                        <li class="list-group-item">
                            <a href="{{route('channel',['id' => $item->id])}}">{{$item->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

