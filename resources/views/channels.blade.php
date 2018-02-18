
            <div class="panel panel-default">

                    <div class="panel-body">
                                <a href="/discussion-forum/public/forum" class = "text-center">Forum</a>
                    </div>
                    <div class="panel-body">
                        <a href="/discussion-forum/public/forum?filter=me" class = "text-center">My Discussions</a>
                    </div>
                    <div class="panel-body">
                        <a href="/discussion-forum/public/forum?filter=answered" class = "text-center">Answered Discussions</a>
                    </div>
                    <div class="panel-body">
                        <a href="/discussion-forum/public/forum?filter=unanswered" class = "text-center">Unanswered Discussions</a>
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

