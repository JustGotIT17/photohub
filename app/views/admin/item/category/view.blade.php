@extends('......layouts.dashboard')
@section('content')
    <input type="hidden" id="page" value="items">

    <div class="row">
        <!-- Add new category item -->

        <div class="col-sm-12 col-md-6 col-lg-612">
            <div class="modal fade add-item-category" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="addCredit">
                        <div class="row">
                            <div class="col-md-12">
                            {{ Form::open(['url' => '/items/category/add', 'class' => 'form-horizontal', 'role' => 'form']) }}
                                <div class="panel panel-default">
                                    <div class="panel-heading clearfix">
                                        <h4 class="pull-left">Add Item Category</h4>
                                        <button type="button" class="close pull-right" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Close"><i class="fa fa-close fa-fw"></i> </button>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                                                <div class = "form-group">
                                                    {{ Form::label('name', '* Category Name:'); }}
                                                    {{ $errors->first('name', '<br/><span class=errormsg>*:message</span>') }}
                                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'eg. 3R Photo']) }}
                                                </div>
                                                <div class = "form-group">
                                                    {{ Form::label('description', '* Category Description:'); }}
                                                    {{ $errors->first('description', '<br/><span class=errormsg>*:message</span>') }}
                                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=> '']) }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-footer clearfix">
                                        {{Form::submit('Submit', ['class'=>'btn btn-primary margin-right-lg pull-right', 'onclick'=>'return confirm("Are you sure?");'])}}
                                    </div>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end modal category item-->

        <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                     <div class="pull-left">
                        <span style="font-size: 1.2em; display: inline"><i class="fa fa-th"></i> Item Categories</span>
                     </div>
                      <div class="pull-right">
                        {{ HTML::decode(HTML::link('#', '<span data-toggle="tooltip" data-placement="bottom" data-original-title="Add new item category"><i class="fa fa-plus-circle fa-fw"></i> Add Category</span>',  array('data-target' => '.add-item-category', 'class' => 'btn btn-default','data-toggle' => 'modal'))) }}
                      </div>
                </div>
                <div class="panel-body">
                    @if (count($categories))
                         <div class="panel-body remove-padding table-responsive">
                            <table id="tblMyCart" class="table table-hover">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                          @foreach($categories as $row)

                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>
                                    <strong>{{$row->name}}</strong>
                                  </td>
                                  <td>
                                    <i>{{$row->description}}</i>
                                  </td>
                                  <td>
                                    {{ HTML::decode(link_to('items/category/edit/'.$row->id, '<i class="fa fa-edit fa-fw"></i>', array('class' => 'btn btn-primary', 'data-original-title' => 'Update this Item', 'data-toggle' => 'tooltip'))) }}
                                    {{ HTML::decode(link_to('items/category/remove/'.$row->id, '<i class="glyphicon glyphicon-remove"></i>', array('class' => 'btn btn-danger', 'data-original-title' => 'Remove this Item', 'data-toggle' => 'tooltip', 'onclick' => "return confirm('Are you sure?');"))) }}
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
                        {{$categories->links()}}
                    </span>
                </div>
            </div>
        </div>
    </div>
@stop
