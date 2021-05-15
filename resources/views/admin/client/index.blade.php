@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container pt-4">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td> {{$client->id}} </td>
                        <td> <a href="{{route('client.show', $client->id)}}"> {{$client->name}} </a></td>
                        <td> {{$client->dni}} </td>
                        <td> {{$client->address}} </td>
                        <td> {{$client->phone}} </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop