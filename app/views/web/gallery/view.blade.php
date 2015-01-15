<div class="row">
    @if(count($gal))
        @foreach($gal as $item)

                <div id="popUp">
                    <ul>
                        <li><img src="{{asset($item->path)}}" alt="{{$item->id}}"></li>
                    </ul>

                </div>

        @endforeach
    @else
        <div class="alert alert-info margin-top-sm">No photos</div>
    @endif
</div>
