@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    show client
    {{-- {{$client->name}}
    {{$client->dni}}
    {{$client->ruc}}
    {{$client->address}}
    {{$client->phone}}
    {{$client->email}} --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop