
<div class="row">
    @if(count($products))
        @foreach($products as $item)
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <div id="popUp" class="thumbnail">
                  <img src="{{asset($item->image)}}" alt="{{$item->id}}">
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info margin-top-sm">No products</div>
    @endif
</div>
