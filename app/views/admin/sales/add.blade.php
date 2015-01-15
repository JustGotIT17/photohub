@extends('layouts.dashboard')
@section('content')

    <input type="hidden" id="page" value="salesAdd">
        @if(isset($success))
            <div class="alert alert-success show-alert">
                <i class="fa fa-check-circle fa-2x fa-fw"></i> $success.
            </div>
         @endif


    <div class="row">
        @if(count($cartItems))
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 clearfix">
            <a href="/cart/destroy" class="btn btn-danger pull-right"><i class="fa fa-close fa-fw"></i> Clear Cart</a>
            <span class="pull-right">
            </span>
        </div><br/><br/>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-6 pull-left">
                            <h4>Sales Register</h4>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 pull-right">
                           <input type="text" id="findProductByID" class="form-control" placeholder="Find Product...">
                           <span class="fa fa-search fa-fw pull-right" style="margin-top: -25px; margin-right: 20px; padding-left: 100px;"></span>
                           <div id="showItemsByID">

                           </div>

                        </div>
                    </div>



                </div>
                <div class="panel-body">
                    @if(count($cartItems))
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>Item ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                            @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{$item->name}}</td>
                                    <td id="{{$item->rowid}}" contenteditable="true" class="single-line">{{ $item->qty }}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <a href="/cart/remove/{{$item->rowid}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-remove"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <br/><div class="alert alert-info"><i class="fa fa-info"></i> No items found.</div>
                    @endif
                </div>
                <div class="panel-footer clearfix">
                @if(count($cartTotal) && count($cartNoOfItems))
                    <h4 class="pull-left"><strong>Total Amount: </strong> Php {{ number_format($cartTotal, 2, '.', ',')}}</h4>
                    <h4 class="pull-right"><strong>Total No. of Items: </strong> {{$cartNoOfItems}}</h4>

                @endif
                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
        {{ Form::open(['url' => '/cart/checkout', 'class' => 'form-horizontal', 'role' => 'form']) }}
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="text-info pull-left">Printing Receipt</h4>
                    {{Form::submit('Checkout', ['class'=>'btn btn-primary pull-right', 'id'=>'btnCheckout'])}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="text" class="form-control" name="cash" id="cashReceived" placeholder="Cash Received">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">SUMMARY OF BILL</th>
                                </tr>
                                <tr>
                                    <th>Sub Total: </th>
                                    <td>Php {{ number_format($cartTotal, 2, '.', ',')}}</td>
                                </tr>
                                <tr>
                                    <th>System Charge (10%): </th>
                                    <td>Php {{ number_format($tax = $cartTotal * .1, 2, '.', ',' )}}</td>
                                </tr>
                                <tr>
                                    <th>Total: </th>
                                    <td>Php <span id="pTotal">{{ number_format($cartTotal, 2, '.', ',')}}</span></td>
                                </tr>
                                <tr>
                                    <th>Change Due: (Php)</th>
                                    <td><input type="text" name="change" id="pChange" class="form-control" value="0.00" readonly></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        {{Form::close()}}
        </div>
    </div>

@stop