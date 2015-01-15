@extends('layouts.dashboard')
@section('content')

<div class="row">
    <div class="modal fade create-album" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">Create Albums</h4>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['url'=>'/gallery/album/create','role'=>'form'])}}
                            <div class = "form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Album Name'])}}
                                {{ $errors->first('name', '<span class=errormsg>*:message</span>') }}
                            </div>
                            <div class = "form-group">
                                {{Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Album Description'])}}
                                {{ $errors->first('description', '<span class=errormsg>*:message</span>') }}
                            </div>
                            {{Form::submit('Create', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade upload-photos" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Upload Photos</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('url'=>'gallery/upload','files'=>true)) }}
                            <div class = "form-group">
                            <p><b>Album Name</b></p>
                            {{Form::select('album', $album, null, ['class' => 'form-control offices'])}}
                            {{ $errors->first('album', '<span class=errormsg>*:message</span>') }}
                            </div>
                            <div class = "form-group">
                             {{ Form::label('file','File',array('id'=>'','class'=>'form-control')) }}
                             {{ Form::file('files[]', ['multiple' => true, 'accept'=>'image/*'],array('id'=>'','class'=>'form-control')) }}
                             {{ $errors->first('files[]', '<span class=errormsg>*:message</span>') }}
                            </div>
                             {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">Albums</h4>
                <span class="pull-right">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".create-album">Create Album</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".upload-photos">Upload Photos</a>
                </span>
            </div>
            <div class="panel-body">
                @if(count($albums))
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Album Name</th>
                                <th>Description</th>
                                <th>Total Photos</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($albums as $album)
                            <tr>
                                <td>{{$album->id}}</td>
                                <td><a href="gallery/view/{{$album->id}}">{{$album->name}}</a></td>
                                <td>{{$album->description}}</td>
                                <td>{{$album->gallery->count()}}</td>
                                <td>{{$album->created_at}}</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info"><i class="fa fa-info fa-fw margin-top-sm"></i>No Albums yet.</div>
                @endif
            </div>
        </div>
    </div>

</div>

@stop