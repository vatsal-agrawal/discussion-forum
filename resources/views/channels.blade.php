

            <div class="panel panel-default">
                <div class="panel-heading">Channels</div>

                <div class="panel-body">
                     <ul class="list-group">       
                        @foreach ($channels as $item)
                        <li class="list-group-item">
                            {{$item->title}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

