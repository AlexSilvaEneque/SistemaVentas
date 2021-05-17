@extends('adminlte::page')

@section('title', 'Providers | Details')

@section('content_header')
    <h1>Providers</h1>
@stop

@section('content')
    <div class="container">
        <div class="container">
            <h5>Name :</h5>
            <label for="" class="ml-4 text-gray">{{$provider->name}}</label>
            <h5>Dni :</h5>
            <label for="" class="ml-4 text-gray">{{$provider->email}}</label>
            <h5>Address :</h5>
            <label for="" class="ml-4 text-gray">{{$provider->ruc_number}}</label>
            <h5>Phone :</h5>
            <label for="" class="ml-4 text-gray">{{$provider->address}}</label>
            <h5>Email :</h5>
            <label for="" class="ml-4 text-gray">{{$provider->phone}}</label>
            <h5>Registration date :</h5>
            <label for="" class="ml-4 text-gray">{{$provider->created_at}}</label>
        </div>        
    </div>  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop