@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="branch.sales">
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">Branch Sales</h4>
                <a href="/sales/branch/{{$id}}/all" class="btn btn-default pull-right"><i class="fa fa-adn fa-fw"></i> Show All</a>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Receipt ID</th>
                            <th>Employee</th>
                            <th>Total Amount</th>
                            <th>Cash Received</th>
                            <th>Change Due</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($items))
                        @foreach($items as $row)
                        <tr>
                            <td><a href="/sales/view/{{$row->transaction_id}}">{{$row->transaction_id}}</a></td>
                            <td>{{User::getEmployeeName($row->user_id)}}</td>
                            <td>Php {{number_format($row->totalAmount, 2, '.', ',')}}</td>
                            <td>Php {{number_format($row->cash, 2, '.', ',')}}</td>
                            <td>Php {{number_format($row->change, 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5"><div class="alert alert-info text-center">No transaction found.</div> </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="panel-footer clearfix">
                <span class="pull-right"> {{$items->links()}}</span>
            </div>

        </div>
    </div>
</div>

@stop