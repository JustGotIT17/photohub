@extends('layouts.dashboard')
@section('content')
{{HTML::style('css/jquery-ui.css') }}
<input type="hidden" id="page" value="reports.sales">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading clearfix hidden-print">
                <h4 class="pull-left">Sales Report</h4>
                <span class="pull-right">
                    <a href="#" onclick="window.print();" class="btn btn-default"><i class="fa fa-print fa-fw"></i> Print Copy</a>
                    <!--<a href="/reports/save" class="btn btn-primary"><i class="fa fa-file-pdf-o fa-fw"></i> Save as PDF</a>-->
                </span>
            </div>
            <div id="basicReport" class="panel-body">

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 hidden-print">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="pull-left"><i class="fa fa-bar-chart-o"></i> Reporting Options</h4>
            </div>
            <div class="panel-body">

                <select class="form-control">
                    <option value="1">Today</option>
                    <option value="2">Yesterday</option>
                    <option value="3">This week</option>
                    <option value="4">This Month</option>
                    <option value="5">This Year</option>
                    <option value="6">All</option>
                </select>
                <hr/>
               <div class="row">
                   {{ Form::open(['url' => '/reports/view', 'class' => '', 'role' => 'form']) }}
                   <div class="col-md-12">
                       <div class="form-group">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i> From</span>
                               {{ Form::text('dateFrom', null, ['class' => 'form-control', 'id' => 'datepicker1']) }}
                               {{ $errors->first('dateFrom', '<br/><span class=errormsg>*:message</span>') }}
                           </div>
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="form-group">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i> To</span>
                               {{ Form::text('dateTo', null, ['class' => 'form-control', 'id' => 'datepicker2']) }}
                               {{ $errors->first('dateTo', '<br/><span class=errormsg>*:message</span>') }}
                           </div>
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="form-group">
                           <div class="input-group pull-right">
                               {{ Form::submit('Generate Report', ['class' => 'btn btn-default']) }}
                           </div>
                       </div>
                   </div>
                   {{Form::close()}}
               </div>
            </div>
        </div>
    </div>

</div>
        {{HTML::style('css/report.css')}}
@stop