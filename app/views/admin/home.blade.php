@extends('layouts.dashboard')
@section('content')
<input type="hidden" id="page" value="dashboard.home">
@include('admin.dashboard.index');
@stop