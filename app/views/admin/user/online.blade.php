@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="users.online">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Online Users</h4>
    </div>
    <div class="panel-body">
        @if(count($ol))
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ol as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->branch->name}}</td>
                    <td>{{ Form::select('status', $status, $item->isOnline, ['class'=>'form-control', 'disabled'=>'disabled'])}}</td>
                    <td><a href="/users/set/offline/{{$item->id}}/0" class="btn btn-danger">Offline</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-info">No users online.</div>
        @endif
    </div>
    <div class="panel-footer">
        {{$ol->links()}}
    </div>
</div>

@stop