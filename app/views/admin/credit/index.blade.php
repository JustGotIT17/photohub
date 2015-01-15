@extends('layouts.dashboard')
@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Credit Movements</h4>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Branch</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($credits as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->branch->name}}</td>
                            <td>{{number_format($item->amount, 2, '.', ',')}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer clearfix">
                <span class="pull-right">
                    {{$credits->links()}}
                </span>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add Credit
            </div>
            {{ Form::open(['url' => '/credits/add', 'class' => 'form-horizontal', 'role' => 'form']) }}
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                        <div id="osm" class="form-group">
                            {{ Form::label('branch', '* Branch:'); }}
                            {{ $errors->first('branch', '<br/><span class=errormsg>*:message</span>') }}
                            {{ isset($branchList) ? Form::select('branch_id',  $branchList, null, ['class' => 'form-control offices']) : '' }}
                        </div>
                        <div class = "form-group">
                            {{ Form::label('amount', '* Amount to Add:'); }}
                            {{ $errors->first('amount', '<br/><span class=errormsg>*:message</span>') }}
                            {{ Form::text('amount', null, ['class' => 'form-control', 'placeholder'=> 'Eg.: 10000']) }}
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel-footer clearfix">
                {{Form::submit('Submit', ['class'=>'btn btn-primary margin-right-lg pull-right', 'onclick'=>'return confirm("Are you sure?");'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

</div>

@stop