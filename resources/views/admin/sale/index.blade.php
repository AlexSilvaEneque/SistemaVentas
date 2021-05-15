@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Sale</h1>
@stop

@section('content')
    <div class="container pt-4">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id Client</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Date</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td> {{$sale->id}} </td>
                        <td> {{$sale->client_id}} </td>
                        <td> {{$sale->user_id}} </td>
                        <td> {{$sale->sale_date}} </td>
                        <td> {{$sale->tax}} </td>
                        <td> {{$sale->total}} </td>
                        <td> {{$sale->status}} </td>
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