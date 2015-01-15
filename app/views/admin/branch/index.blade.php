@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="branch">

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div id="addItemForm" class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <span><i class="fa fa-plus-circle fa-2x fa-fw"></i> Add New Branch</span>
                    <span class="pull-right">
                        <button onclick="btnCloseAddItem()" class="btn btn-sm btn-danger"><i class="fa fa-close fa-fw"></i> </button>
                    </span>
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => '/branches/add', 'class' => 'form-horizontal col-md-12', 'role' => 'form']) }}
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class = "form-group">
                                {{ Form::label('name', '* Branch Name:'); }}
                                {{ $errors->first('name', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Name']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('address', '* Address:'); }}
                                {{ $errors->first('address', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('address', null, ['class' => 'form-control', 'placeholder'=> 'Address']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('tin', '* TIN:'); }}
                                {{ $errors->first('tin', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('tin', null, ['class' => 'form-control', 'placeholder'=> 'TIN']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('contact', '* Contact Number:'); }}
                                {{ $errors->first('contact', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('contact', null, ['class' => 'form-control', 'placeholder'=>'Contact Number']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('amount', '* Initial System Credit:'); }}
                                {{ $errors->first('amount', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('amount', null, ['class' => 'form-control', 'placeholder'=>'Eg.: 1000']) }}
                            </div>
                            <div class="form-group">
                                {{HTML::decode(Form::submit('Submit', ['class'=>'btn btn-primary']))}}
                            </div>
                        </div>

                    </div>

                </div>
                    {{Form::close()}}
            </div>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                     <div class="pull-left">
                        <span style="font-size: 1.2em; display: inline"><i class="fa fa-th"></i> Branches</span>
                     </div>
                      <div class="pull-right">
                          {{ HTML::decode(HTML::link('#', '<i class="fa fa-plus-circle fa-fw"></i> Add Branch',  array('onclick' => 'btnAddItem()', 'class' => 'btn btn-default tooltip-top', 'data-original-title' => 'Add new item', 'data-toggle' => 'tooltip'))) }}
                      </div>
                </div>
                <div class="panel-body">
                    @if (count($branch))
                         <div class="panel-body remove-padding table-responsive">
                            <table id="tblMyCart" class="table table-hover table-striped">
                              <thead>
                                <tr>
                                  <th class="onepx">ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>TIN</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                          @foreach($branch as $row)

                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>
                                    <strong>{{$row->name}}</strong>
                                  </td>
                                  <td>{{$row->address}}</td>
                                  <td>{{ $row->TIN }}</td>
                                  <td>{{ $row->contact }}</td>
                                  <td>
                                    {{ HTML::decode(link_to('branches/edit/'.$row->id, '<i class="fa fa-edit fa-fw"></i>', array('class' => 'btn btn-primary tooltip-top', 'data-original-title' => 'Update this Item', 'data-toggle' => 'tooltip'))) }}
                                    {{ HTML::decode(link_to('branches/remove/'.$row->id, '<i class="glyphicon glyphicon-remove"></i>', array('class' => 'btn btn-danger tooltip-top', 'data-original-title' => 'Remove this Item', 'data-toggle' => 'tooltip', 'onclick' => "return confirm('Are you sure?');"))) }}
                                  </td>
                             </tr>

                          @endforeach

                          </tbody>
                        </table>
                      </div>


                  @endif
                </div>
                <div class="panel-footer clearfix">
                    <span class="pull-right">
                        {{$branch->links()}}
                    </span>
                </div>
            </div>

        </div>
    </div>
@stop