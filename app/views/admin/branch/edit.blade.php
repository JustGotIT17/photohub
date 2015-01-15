@extends('layouts.dashboard')
@section('content')

<div class="row-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div id="addItemForm" class="panel panel-primary">
            <div class="panel-heading clearfix">
                <span><i class="fa fa-edit fa-2x fa-fw"></i> Edit Branch</span>
                <span class="pull-right">
                    <button onclick="btnCloseAddItem()" class="btn btn-sm btn-danger"><i class="fa fa-close fa-fw"></i> </button>
                </span>
            </div>
            <div class="panel-body">
                @if(isset($success))
                    <div class="alert-success">{{$success}}</div>
                @endif
                {{ Form::open(['url' => '/branches/save/'.$branch->id, 'class' => 'form-horizontal col-md-12', 'role' => 'form']) }}
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                        <div class = "form-group">
                            {{ Form::label('name', '* Branch Name:'); }}
                            {{ $errors->first('name', '<br/><span class=errormsg>*:message</span>') }}
                            {{ Form::text('name', $branch->name, ['class' => 'form-control', 'placeholder'=> 'Name']) }}
                        </div>
                        <div class = "form-group">
                            {{ Form::label('address', '* Address:'); }}
                            {{ $errors->first('address', '<br/><span class=errormsg>*:message</span>') }}
                            {{ Form::text('address', $branch->address, ['class' => 'form-control', 'placeholder'=> 'Address']) }}
                        </div>
                        <div class = "form-group">
                            {{ Form::label('tin', '* TIN:'); }}
                            {{ $errors->first('tin', '<br/><span class=errormsg>*:message</span>') }}
                            {{ Form::text('tin', $branch->TIN, ['class' => 'form-control', 'placeholder'=> 'TIN']) }}
                        </div>
                        <div class = "form-group">
                            {{ Form::label('contact', '* Contact Number:'); }}
                            {{ $errors->first('contact', '<br/><span class=errormsg>*:message</span>') }}
                            {{ Form::text('contact', $branch->contact, ['class' => 'form-control', 'placeholder'=>'Contact Number']) }}
                        </div>
                        <div class="form-group">
                            {{HTML::decode(Form::submit('Submit', ['class'=>'btn btn-primary']))}}
                        </div>
                    </div>

                </div>

            </div>
                {{Form::close()}}
        </div>
    </div>
</div>

@stop