@extends('layouts.dashboard')
@section('content')
<div id="content" class="row">
    @if(count($gal))
        @foreach($gal as $item)
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <div  id="gallery-img" class="thumbnail">
                   <img src="{{asset($item->path)}}" alt="{{$item->id}}">
                   <a id="{{$item->id}}" href="#" class="btn btn-danger btn-sm" style="position: absolute; top: 0px;"><i class="fa fa-remove"></i> </a>
                </div>

            </div>
        @endforeach
    @else
        <div class="alert alert-info margin-top-sm">No photos</div>
    @endif
</div>

@stop