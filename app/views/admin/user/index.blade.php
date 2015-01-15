@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="users">

@if(isset($success))
        <div class="alert alert-success">
            <i class="fa fa-check-circle fa-2x fa-fw"></i> $success.
        </div>
     @endif
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <div id="addItemForm" class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <span><i class="fa fa-plus-circle fa-2x fa-fw"></i> Add New Employees</span>
                    <span class="pull-right">
                        <button onclick="btnCloseAddItem()" class="btn btn-sm btn-danger"><i class="fa fa-close fa-fw"></i> </button>
                    </span>
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => '/users/add', 'class' => 'form-horizontal col-md-12', 'role' => 'form']) }}
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <div class = "form-group">
                                {{ Form::label('username', '* Username:'); }}
                                {{ $errors->first('username', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('username', null, ['class' => 'form-control', 'placeholder'=> 'Username']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('lastName', '* Last name:'); }}
                                {{ $errors->first('lastName', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('lastName', null, ['class' => 'form-control', 'placeholder'=> 'Last name']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('firstName', '* First name:'); }}
                                {{ $errors->first('firstName', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('firstName', null, ['class' => 'form-control', 'placeholder'=> 'First name']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('password', '* Password:'); }}
                                {{ $errors->first('password', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::password('password', ['id'=>'txtPassword','class' => 'form-control']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('cpassword', '* Re-type Password:'); }}
                                {{ $errors->first('cpassword', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::password('cpassword', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">

                            <div id="osm" class="form-group">
                                {{ Form::label('catID', '* Branch:'); }}
                                {{ $errors->first('catID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('branchID', $branch, null, ['class' => 'form-control offices']) }}
                            </div>
                            <div id="osm" class="form-group">
                                {{ Form::label('supID', '* Role:'); }}
                                {{ $errors->first('supID', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::select('roleID', $role, null, ['class' => 'form-control offices']) }}
                            </div>
                            <div class = "form-group">
                                {{ Form::label('email', '* E-mail address:'); }}
                                {{ $errors->first('email', '<br/><span class=errormsg>*:message</span>') }}
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder'=> 'sample@photohub.ph']) }}
                            </div>
                            <div class="form-group">
                                {{HTML::decode(Form::submit('Submit', ['id'=>'btnAddUser','class'=>'btn btn-primary']))}}
                            </div>
                        </div>

                    </div>
                    {{Form::close()}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                     <div class="pull-left">
                        <span style="font-size: 1.2em; display: inline"><i class="fa fa-th"></i> Employees</span>
                     </div>
                      <div class="pull-right">
                          {{ HTML::decode(HTML::link('#', '<i class="fa fa-plus-circle fa-fw"></i> Add User',  array('onclick' => 'btnAddItem()', 'class' => 'btn btn-default tooltip-top', 'data-original-title' => 'Add User', 'data-toggle' => 'tooltip'))) }}
                      </div>
                </div>
                <div class="panel-body">
                    @if (count($user))
                         <div class="panel-body remove-padding table-responsive">
                            <table id="tblMyCart" class="table table-hover">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Branch</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                          @foreach($user as $row)

                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>
                                    <strong>{{$row->username}}</strong>
                                  </td>
                                  <td>{{ $row->lastName . ', ' . $row->firstName }}</td>
                                  <td>{{$row->email}}</td>
                                  <td>{{ User::getBranchName($row->branch_id) }}</td>
                                  <td>{{ User::getRoleName($row->role_id) }}</td>
                                  <td>
                                    {{ HTML::decode(link_to('users/edit/'.$row->id, '<i class="fa fa-edit fa-fw"></i>', array('class' => 'btn btn-primary', 'data-original-title' => 'Update User', 'data-toggle' => 'tooltip'))) }}
                                    {{ HTML::decode(link_to('users/remove/'.$row->id, '<i class="glyphicon glyphicon-remove"></i>', array('class' => 'btn btn-danger', 'data-original-title' => 'Remove User', 'data-toggle' => 'tooltip', 'onclick' => "return confirm('Are you sure?');"))) }}
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
                        {{$user->links()}}
                    </span>
                </div>
            </div>
        </div>
    </div>

@stop