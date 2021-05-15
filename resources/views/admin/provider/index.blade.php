@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Providers</h1>
@stop

@section('content')
    <div class="container pt-4">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">RUC</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                    <tr>
                        <td> {{$provider->id}} </td>
                        <td> {{$provider->name}} </td>
                        <td> {{$provider->email}} </td>
                        <td> {{$provider->ruc_nnumber}} </td>
                        <td> {{$provider->address}} </td>
                        <td> {{$provider->phone}} </td>
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