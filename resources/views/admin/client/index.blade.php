@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
    <h1>Clients</h1>
@stop

@section('content')
    <div class="container pt-4">
        <a href="{{route('client.create')}}" class="btn btn-outline-primary"><i class="bi bi-plus-circle-fill" style="font-size: 1.2em;"></i></a>
        <div class="card mt-2">
            <div class="card-body">
                <div class="text-right">
                    <div class="btn-group">
                        <h4 class="card-title text-right">
                            <a href="#">
                                <i class="bi bi-cloud-download"></i>
                                Export
                            </a>
                        </h4>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Dni</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
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
                                <td>
                                    <div class="container d-flex">
                                        <a href="{{route('client.edit', $client)}}" class="btn btn-outline-success mr-2"><i class="bi bi-pencil-square"></i></a>
        
                                        <form action="{{route('client.destroy', $client)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop