@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="users.edit">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <div id="addItemForm" class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <span><i class="fa fa-edit fa-2x fa-fw"></i> Edit Employee</span>

                </div>
                <div class="panel-body">
                    @if(isset($_SESSION['notify']))
                    <div class="alert alert-info">
                        {{$msg}}
                    </div>
                    @endif
                    {{ Form::open(['url' => '/users/save/'.$user->id, 'class' => 'form-horizontal col-md-12', 'role' => 'form']) }}
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class = "form-group">
                                {{ Form::label('username', '* Username:'); }}
                                {{ $errors->first('username', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('username', $user->username, ['class' => 'form-control', 'placeholder'=> 'Username', 'disabled'=>'disabled']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('lastName', '* Last name:'); }}
                                {{ $errors->first('lastName', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('lastName', $user->lastName, ['class' => 'form-control', 'placeholder'=> 'Last name']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('firstName', '* First name:'); }}
                                {{ $errors->first('firstName', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('firstName', $user->firstName, ['class' => 'form-control', 'placeholder'=> 'First name']) }}
                            </div>
                            @if(Auth::user()->role_id != '1')
                            <div class = "form-group">
                                {{ Form::label('curpassword', '* Current Password:'); }}
                                {{ $errors->first('curpassword', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::password('curpassword', ['id'=>'txtCurPassword','class' => 'form-control']) }}
                            </div>
                            @endif
                            <div class = "form-group">
                                {{ Form::label('password', '* Password:'); }}
                                {{ $errors->first('password', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::password('password', ['id'=>'txtPassword', 'class' => 'form-control']) }}
                            </div>

                        </div>
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class = "form-group">
                                {{ Form::label('cpassword', '* Re-type Password:'); }}
                                {{ $errors->first('cpassword', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::password('cpassword', ['class' => 'form-control']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('catID', '* Branch:'); }}
                                {{ $errors->first('catID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('branchID', $branch, $user->branch_id, ['class' => 'form-control offices']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('supID', '* Role:'); }}
                                {{ $errors->first('supID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('roleID', $role, $user->role_id, ['class' => 'form-control offices']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('email', '* E-mail address:'); }}
                                {{ $errors->first('email', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder'=> 'sample@photohub.ph']) }}
                            </div>
                            <div class="form-group">
                                {{HTML::decode(Form::submit('Submit', ['id'=>'btnEditUser','class'=>'btn btn-primary']))}}
                            </div>
                        </div>

                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop