@extends('layouts.dashboard')
@section('content')
{{HTML::style('css/jquery-ui.css') }}
<div class="row">
    <div class="modal fade create-event" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <h4><i class="fa fa-plus"></i> Create Events</h4>
                     </div>
                     <div class="panel-body">
                         {{Form::open(['url'=>'/events/create','role'=>'form'])}}
                             <div class = "form-group">
                                 {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Event Name'])}}
                                 {{ $errors->first('name', '<span class=errormsg>*:message</span>') }}
                             </div>
                             <div class = "form-group">
                                 {{Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Event Description'])}}
                                 {{ $errors->first('description', '<span class=errormsg>*:message</span>') }}
                             </div>
                             <div class = "form-group">
                                  {{Form::text('eventDate', null, ['id'=>'eventDate', 'class'=>'form-control', 'placeholder'=>'Date'])}}
                                  {{ $errors->first('eventDate', '<span class=errormsg>*:message</span>') }}
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
                 <h4 class="pull-left"><i class="fa fa-calendar fa-fw"></i> Events</h4>
                 <span class="pull-right">
                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".create-event"><i class="fa fa-plus"></i> Create Event</a>
                 </span>
             </div>
             <div class="panel-body">
                @if(count($events))
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event Name</th>
                                <th>Description</th>
                                <th>Date Scheduled</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($events as $event)
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->description}}</td>
                                <td>{{$event->event_date}}</td>
                                <td>{{$event->created_at}}</td>
                                <td>
                                    <a href="/events/edit/{{$event->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                    <a href="/events/delete/{{$event->id}}" class="btn btn-danger"><i class="fa fa-remove" onclick="return confirm('Are you sure, you want to delete this event?')"></i> </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info"><i class="fa fa-info fa-fw margin-top-sm"></i>No Events yet.</div>
                @endif
             </div>
         </div>
    </div>

</div>
@stop