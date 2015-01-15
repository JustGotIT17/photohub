<div class="abs">
    <ul class="list-group">
    @if(count($items))
        @foreach($items as $item)
        <li class="list-group-item clearfix">
            <span class="pull-left">
                {{$item->name}}
            </span>
            <span class="pull-right">
                <a href="/cart/add/{{$item->id}}" class="btn btn-sm btn-primary">Add</a>
            </span>
        </li>
        @endforeach
    @else
    <li class="list-group-item clearfix">
        <small>No result found.</small>
    </li>
    @endif
    </ul>
</div>