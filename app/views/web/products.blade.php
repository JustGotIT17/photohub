
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="list-group" id="products">
                @if(count($category))
                    @foreach($category as $item)
                        <a id="{{$item->id}}" href="#" class="list-group-item {{($first->id == $item->id) ? 'active' : ''}}">{{$item->name}}</a>
                    @endforeach
                @else
                     <div class="list-group-item">No product category yet.</div>
                @endif
            </div>
        </div>
        <script>
            features.load("#content", '/web/products/view/{{ $first->id }}');
        </script>
         <div id="content" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

        </div>
    </div>
</div>

