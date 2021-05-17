@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
    <h1>Clients</h1>
@stop

@section('content')
    <div class="container pt-4">
        <a href="{{route('clients.create')}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle" style="font-size: 1.2em;"></i></a>
        <div class="card mt-2">
            <div class="card-body">
                <div class="text-right">
                    <div class="btn-group">
                        <h4 class="card-title text-right">
                            <a href="#">
                                <i class="fas fa-file-download"></i>
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
                                <td> <a href="{{route('clients.show', $client->id)}}"> {{$client->name}} </a></td>
                                <td> {{$client->dni}} </td>
                                <td> {{$client->address}} </td>
                                <td> {{$client->phone}} </td>                            
                                <td>
                                    <div class="container d-flex">
                                        <a href="{{route('clients.edit', $client)}}" class="btn btn-outline-success mr-2"><i class="far fa-edit"></i></a>
        
                                        <form action="{{route('clients.destroy', $client)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop