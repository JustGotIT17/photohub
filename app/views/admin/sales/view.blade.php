@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix hidden-print">
                <h4 class="pull-left">View Receipt No.: {{$cartInfo->transaction_id}}</h4>
                <a href="#" onclick="window.print();" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="panel-body clearfix receipt">
                <!--<center><img src="{{asset('img/logo.png')}}" class="img-responsive logo" alt="photohub logo" /></center>-->
                @if(count($branch))
                    <h5 class="text-center text-uppercase">{{$branch->name}}</h5>
                    <p class="text-center">{{ucwords($branch->address)}}<br/>
                    TIN: {{$branch->TIN}}<br/>
                    Contact No.: {{$branch->contact}}<br>
                    <h6 class="text-center">Official Receipt</h6>
                    <p class="text-center"> {{$cartInfo->created_at}}</p>
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
                                <td>{{ucwords(Item::getItemName($item->item_id))}}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Php {{$item->price}}</td>
                                <td>Php {{($item->qty * $item->price)}}</td>
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
                            <td>Php {{ number_format($cartInfo->totalAmount, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>System Fee: </th>
                            <td>Php {{ number_format($cartInfo->totalAmount * .1, 2, '.', ',' )}}</td>
                        </tr>
                        <tr>
                            <th>Total: </th>
                            <td>Php {{ number_format($cartInfo->totalAmount, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>Cash: </th>
                            <td>Php {{ number_format($cartInfo->cash, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>Change Due: </th>
                            <td>Php {{ number_format($cartInfo->change, 2, '.', ',')}}</td>
                        </tr>
                    </table><br/>
                    <hr class="no-padding"/>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <span class="pull-left">
                            <small>{{ucwords(User::getEmployeeName($cartInfo->user_id))}} | #: {{$cartInfo->transaction_id}}</small>
                        </span>
                        <span class="pull-right">
                            <small><i class="fa fa-copyright"></i> Photohub.ph | {{date('Y')}} </small>
                        </span>
                    </div>
            </div>
            <div class="panel-footer">
                <span class="pull-right">
                </span>
            </div>
        </div>
    </div>
</div>
    {{HTML::style('css/receipt.css')}}
@stop