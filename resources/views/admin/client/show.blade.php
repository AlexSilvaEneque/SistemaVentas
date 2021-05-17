@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
    <h1>Client Data</h1>
@stop

@section('content')
    <div class="container">
        <div class="container">
            <h5>Name :</h5>
            <label for="">{{$client->name}}</label>
            <h5>Dni :</h5>
            <label for="">{{$client->dni}}</label>
            <h5>Address :</h5>
            <label for="">{{$client->address}}</label>
            <h5>Phone :</h5>
            <label for="">{{$client->phone}}</label>
            <h5>Email :</h5>
            <label for="">{{$client->email}}</label>
            <h5>Registration date :</h5>
            <label for="">{{$client->created_at}}</label>
        </div>        
    </div>    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop