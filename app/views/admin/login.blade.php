@extends('layouts.index')
@section('content')

<div class="bannerSection">
    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-4 col-xs-offset-1 col-sm-offset-2 col-md-offset-4">
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left"><i class="fa fa-lock fa-fw"></i>&nbsp Secured Login</h4>
                </div>
                <div class="panel-body offset-both">
                     @if ($errors->has('username') || $errors->has('password'))
                        <div class="alert alert-danger">
                             <i class="fa fa-warning fa-fw"></i>Whoops! something's wrong!<hr style="margin:5px 2px"/>
                             {{ $errors->first('username', '<span class="">*:message</span><br/>') }}
                             {{ $errors->first('password', '<span class="">*:message</span>') }}

                        </div>
                    @endif

                    {{ Form::open(['url' => 'login', 'class' => 'form-horizontal form-login', 'role' => 'form']) }}
                        <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                            {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeHolder' => 'Username']) }}

                            </div>

                        </div>
                        <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                                {{ Form::password('password', ['class' => 'form-control', 'placeHolder' => 'Password']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group-btn clearfix">
                                {{ Form::submit('Login', ['class'=>'btn btn-default pull-right']) }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop