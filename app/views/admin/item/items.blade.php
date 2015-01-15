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
            <div id="addItemForm" class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <span><i class="fa fa-plus-circle fa-2x fa-fw"></i> Add New Item</span>
                    <span class="pull-right">
                        <button onclick="btnCloseAddItem()" class="btn btn-sm btn-danger"><i class="fa fa-close fa-fw"></i> </button>
                    </span>
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => '/items/add', 'class' => 'form-horizontal col-md-12', 'role' => 'form']) }}
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class = "form-group">
                                {{ Form::label('code', '*Item Code:'); }}
                                {{ $errors->first('code', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('code', null, ['class' => 'form-control', 'placeholder'=> 'Item Code']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('name', '* Item Name:'); }}
                                {{ $errors->first('name', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Item Name']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('catID', '* Category:'); }}
                                {{ $errors->first('catID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('catID', $cat, null, ['class' => 'form-control offices']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('supID', '* Supplier:'); }}
                                {{ $errors->first('supID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('supID', $sup, null, ['class' => 'form-control offices']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('costPrice', '* Cost Price:'); }}
                                {{ $errors->first('costPrice', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('costPrice', null, ['class' => 'form-control', 'placeholder'=> 'Cost Price']) }}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                {{ Form::label('branchID', '* Branch:'); }}
                                {{ $errors->first('branchID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('branchID', $branch, null, ['class' => 'form-control offices']) }}
                            </div>
                             <div class = "form-group">
                                {{ Form::label('qty', '* Quantity:'); }}
                                {{ $errors->first('qty', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('qty', null, ['class' => 'form-control', 'placeholder'=> 'Quantity']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('reorder', '* Re-order Lever:'); }}
                                {{ $errors->first('reorder', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('reorder', null, ['class' => 'form-control', 'placeholder'=> 'Re-order Leverl']) }}
                            </div>
                             <div class = "form-group">
                                {{ Form::label('loc', 'Address:'); }}
                                {{ $errors->first('loc', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('loc', null, ['class' => 'form-control', 'placeholder'=> 'Address']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('descr', 'Description:'); }}
                                {{ $errors->first('descr', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::textarea('descr', null, ['class' => 'form-control', 'placeholder'=> 'Description', 'cols'=>'10', 'rows'=>'5']) }}
                            </div>

                            <div class="form-group clearfix">
                                {{ HTML::decode(Form::submit('Submit', ['class'=>'btn btn-primary pull-right']))}}
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                     <div class="pull-left">
                        <span style="font-size: 1.2em; display: inline"><i class="fa fa-th"></i> Items</span>
                     </div>
                      <div class="pull-right">
                        {{ HTML::decode(HTML::link('#', '<span data-toggle="tooltip" data-placement="bottom" data-original-title="Add new item category"><i class="fa fa-plus-circle fa-fw"></i> Add Category</span>',  array('data-target' => '.add-item-category', 'class' => 'btn btn-default','data-toggle' => 'modal'))) }}
                        {{ HTML::decode(HTML::link('#', '<i class="fa fa-plus-circle fa-fw"></i> Add Item',  array('onclick' => 'btnAddItem()', 'class' => 'btn btn-default', 'data-placement'=>'bottom', 'data-original-title' => 'Add new item', 'data-toggle' => 'tooltip'))) }}
                      </div>
                </div>
                <div class="panel-body">
                    @if (count($Items))
                         <div class="panel-body remove-padding table-responsive">
                            <table id="tblMyCart" class="table table-hover">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Cost Price</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Supplier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                          @foreach($Items as $row)

                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>
                                    <strong>{{$row->name}}</strong>
                                  </td>
                                  <td>{{ $row->Category->name }}</td>
                                  <td>Php {{$row->costPrice}}</td>
                                  <td>Php {{ $row->unitPrice }}</td>
                                  <td>{{ $row->quantity }}</td>
                                  <td>{{ $row->Supplier->companyName }}</td>
                                  <td>
                                    {{ HTML::decode(link_to('items/edit/'.$row->id, '<i class="fa fa-edit fa-fw"></i>', array('class' => 'btn btn-primary', 'data-original-title' => 'Update this Item', 'data-toggle' => 'tooltip'))) }}
                                    {{ HTML::decode(link_to('items/remove/'.$row->id, '<i class="glyphicon glyphicon-remove"></i>', array('class' => 'btn btn-danger', 'data-original-title' => 'Remove this Item', 'data-toggle' => 'tooltip', 'onclick' => "return confirm('Are you sure?');"))) }}
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
                        {{$Items->links()}}
                    </span>
                </div>
            </div>
        </div>
    </div>
@stop
