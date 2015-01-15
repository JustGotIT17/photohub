@extends('layouts.dashboard')
@section('content')
<div class="row">
     <div class="modal fade add-advertisement" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Create Advertisement</h4>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['url'=>'/advertisement/create','role'=>'form', 'files'=>true])}}
                            <div class = "form-group">
                            {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name'])}}
                            {{ $errors->first('name', '<span class=errormsg>*:message</span>') }}
                            </div>
                            <div class = "form-group">
                                {{Form::select('branch', $branch, null, ['class' => 'form-control'])}}
                                {{ $errors->first('branch', '<span class=errormsg>*:message</span>') }}
                                </div>
                                <div class = "form-group">
                                 {{ Form::label('file','File',array('id'=>'','class'=>'form-control')) }}
                                 {{ Form::file('files[]', ['multiple' => true, 'accept'=>'image/*'],array('id'=>'','class'=>'form-control')) }}
                                 {{ $errors->first('files[]', '<span class=errormsg>*:message</span>') }}
                                </div>
                            {{Form::submit('Create', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">Advertisements</h4>
                <span class="pull-right">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-advertisement">Add Advertisement</a>
                </span>
            </div>
            <div class="panel-body">
                @if(count($advertisements))
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Active</th>
                                <th>Date Created</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach($advertisements as $advertisement)
                            <tr>
                                <td>{{$advertisement->id}}</td>
                                <td><img src="{{$advertisement->image}}" class="img-responsive" style="width:auto; height:50px;"> </td>
                                <td>{{$advertisement->name}}</td>
                                <td>{{$advertisement->branch_id}}</td>
                                <td>{{($advertisement->active == '1') ? 'Yes' : 'No'}}</td>
                                <td>{{$advertisement->created_at}}</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info"><i class="fa fa-info fa-fw margin-top-sm"></i>No Product yet.</div>
                @endif
            </div>
        </div>
    </div>
</div>


@stop