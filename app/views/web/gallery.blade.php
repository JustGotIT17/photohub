
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div id="gallery" class="list-group">
                @if(count($albums))
                    @foreach($albums as $album)
                        <a id="{{$album->id}}" class="list-group-item {{($first->id == $album->id) ? 'active' : ''}}">{{$album->name}}</a>
                    @endforeach
                @else
                    <div class="list-group-item">No albums yet.</div>
                @endif
            </div>
        </div>
        <script>
            features.load("#content", '/web/gallery/view/{{ $first->id }}');
        </script>
        <div id="content" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        </div>
    </div>
</div>
