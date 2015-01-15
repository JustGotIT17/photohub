@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="sales">

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>My Sales</h4>
            </div>
            <div class="panel-body">
                @if (count($sales))
                     <div class="panel-body remove-padding table-responsive">
                        <table id="tblMyCart" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="onepx">ID</th>
                                    <th>Receipt ID</th>
                                    <th>Employee</th>
                                    <th>Total Amount</th>
                                    <th>Cash Received</th>
                                    <th>Change Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td><a href="/sales/view/{{$row->transaction_id}}">{{$row->transaction_id}}</a></td>
                                    <td>{{User::getEmployeeName($row->user_id)}}</td>
                                    <td>Php {{number_format($row->totalAmount, 2, '.', ',')}}</td>
                                    <td>Php {{number_format($row->cash, 2, '.', ',')}}</td>
                                    <td>Php {{number_format($row->change, 2, '.', ',')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-info text-center">No transaction found.</div>
                @endif
            </div>
            <div class="panel-footer clearfix">
                <span class="pull-right">
                    {{$sales->links()}}
                </span>
            </div>
        </div>
    </div>
</div>
@stop