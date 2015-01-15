@extends('layouts.dashboard')
@section('content')
    <input type="hidden" id="page" value="items.edit">

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <div id="addItemForm" class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <span><i class="fa fa-edit fa-2x fa-fw"></i> Edit Item</span>

                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => '/items/save/'.$items->id, 'class' => 'form-horizontal col-md-12', 'role' => 'form']) }}
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class = "form-group">
                                {{ Form::label('code', '* Item Code:'); }}
                                {{ $errors->first('code', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('code', $items->code, ['class' => 'form-control', 'placeholder'=> 'Item Code']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('name', '* Item Name:'); }}
                                {{ $errors->first('name', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('name', $items->name, ['class' => 'form-control', 'placeholder'=> 'Item Name']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('catID', '* Category:'); }}
                                {{ $errors->first('catID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('catID', $cat, $items->category_id, ['class' => 'form-control offices']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('supID', '* Supplier:'); }}
                                {{ $errors->first('supID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('supID', $sup, $items->supplier_id, ['class' => 'form-control offices']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('costPrice', '* Cost Price:'); }}
                                {{ $errors->first('costPrice', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('costPrice', $items->costPrice, ['class' => 'form-control', 'placeholder'=> 'Cost Price']) }}
                            </div>

                        </div>
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div id="osm" class="form-group">
                                {{ Form::label('branchID', '* Branch:'); }}
                                {{ $errors->first('branchID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('branchID', $branch, $items->branch_id, ['class' => 'form-control offices']) }}
                            </div>
                             <div class = "form-group">
                                {{ Form::label('qty', '* Quantity:'); }}
                                {{ $errors->first('qty', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('qty', $items->quantity, ['class' => 'form-control', 'placeholder'=> 'Quantity']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('reorder', '* Re-order Lever:'); }}
                                {{ $errors->first('reorder', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('reorder', $items->reorderLevel, ['class' => 'form-control', 'placeholder'=> 'Re-order Leverl']) }}
                            </div>
                             <div class = "form-group">
                                {{ Form::label('loc', 'Address:'); }}
                                {{ $errors->first('loc', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('loc', $items->location, ['class' => 'form-control', 'placeholder'=> 'Address']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('descr', 'Description:'); }}
                                {{ $errors->first('descr', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::textarea('descr', $items->description, ['class' => 'form-control', 'placeholder'=> 'Description', 'cols'=>'10', 'rows'=>'5']) }}
                            </div>
                            <div class="form-group clearfix">
                                {{ HTML::decode(Form::submit('Submit', ['class'=>'btn btn-primary pull-right']))}}

                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop