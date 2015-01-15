@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="checkout">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading hidden-print">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix">
                        <h4 class="pull-left">Sales Register</h4>
                        <a href="/sales/add" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
            <div class="panel-body clearfix receipt">
                <!--<center><img src="{{asset('img/logo.png')}}" class="img-responsive logo" alt="photohub logo" /></center>-->
                @if(count($branch))
                    <h5 class="text-center text-uppercase">{{$branch->name}}</h5>
                    <p class="text-center">{{ucwords($branch->address)}}<br/>
                    TIN: {{$branch->TIN}}<br/>
                    Contact No.: {{$branch->contact}}<br/>
                    <br>
                    <h6 class="text-center">Official Receipt</h6>
                    <p class="text-center"> {{date('m/d/Y h:i:sa')}}</p>
                    <br/>
                @endif
                @if(count($cartItems))
                    <table class="table table-responsive">
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>SubTotal</th>
                        </tr>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ucwords($item->name)}}</td>
                                <td id="{{$item->rowid}}">{{ $item->qty }}</td>
                                <td>Php {{$item->price}}</td>
                                <td>Php {{$item->subtotal}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
                    <table class="table">
                        <tr>
                            <th colspan="2" class="text-center">SUMMARY OF BILL</th>
                        </tr>
                        <tr>
                            <th>SubTotal: </th>
                            <td>Php {{ number_format($cartTotal, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>System Fee: </th>
                            <td>Php {{ number_format($tax = $cartTotal * .1, 2, '.', ',' )}}</td>
                        </tr>
                        <tr>
                            <th>Total: </th>
                            <td>Php {{ number_format($cartTotal, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>Cash: </th>
                            <td>Php {{ number_format($cash, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>Change Due: </th>
                            <td>Php {{ number_format($change, 2, '.', ',')}}</td>
                        </tr>
                    </table><br/>
                    <hr class="no-padding"/>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <span class="pull-left">
                            <small>{{Auth::user()->firstName . ' ' . Auth::user()->lastName}} | #: {{$transID}}</small>
                        </span>
                        <span class="pull-right">
                            <small><i class="fa fa-copyright"></i> Photohub.ph | {{date('Y')}} </small>
                        </span>
                    </div>
            </div>
        </div>
    </div>
    {{HTML::style('css/receipt.css')}}
</div>
@stop
{{ Cart::instance('shopping')->destroy(); }}