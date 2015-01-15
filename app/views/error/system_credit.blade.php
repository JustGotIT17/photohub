@extends('layouts.dashboard')
@section('content')

<div class="row-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="jumbotron">
            <h1 class="text-center"><i class="fa fa-ban fa-3x fa-fw"></i><br/>Insufficient System Credit</h1><hr/>
            <p class="text-center">Please contact the administrator and ask to reload your account.</p>
            <h3 class="text-center">Thanks for bearing with us!</h3>
            <center><a href="/cart/destroy" class="btn btn-danger">Clear Cart</a></center>
        </div>
    </div>
</div>

@stop