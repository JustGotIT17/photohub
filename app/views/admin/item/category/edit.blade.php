@extends('......layouts.dashboard')
@section('content')
    <input type="hidden" id="page" value="items">

    <div class="row">
        <!-- Add new category item -->

        <div class="col-sm-12 col-md-6 col-lg-612">
            <div class="row">
                <div class="col-md-12">
                {{ Form::open(['url' => '/items/category/edit/'.$category->id, 'class' => 'form-horizontal', 'role' => 'form']) }}
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h4 class="pull-left">Edit Item Category</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                                    <div class = "form-group">
                                        {{ Form::label('name', '* Category Name:'); }}
                                        {{ $errors->first('name', '<br/><span class=errormsg>*:message</span>') }}
                                        {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder'=> 'eg. 3R Photo']) }}
                                    </div>
                                    <div class = "form-group">
                                        {{ Form::label('description', '* Category Description:'); }}
                                        {{ $errors->first('description', '<br/><span class=errormsg>*:message</span>') }}
                                        {{ Form::textarea('description', $category->description, ['class' => 'form-control', 'placeholder'=> '']) }}
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

        <!-- end modal category item-->

    </div>
@stop
