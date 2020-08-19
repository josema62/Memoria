@extends('adminlte::page')

@section('title', 'Página Principal')

@section('content_header')
<div class="container-fluid">
        <h1>
          Página Principal
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        </ol>
      </div>
@stop

@section('content')
    <p>You are logged in!</p>
@stop
