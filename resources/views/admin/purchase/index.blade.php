@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Purchase</h1>
@stop

@section('content')
    <div class="container pt-4">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id Provider</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Date</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td> {{$purchase->id}} </td>
                        <td> {{$purchase->provider_id}} </td>
                        <td> {{$purchase->user_id}} </td>
                        <td> {{$purchase->purchase_date}} </td>
                        <td> {{$purchase->tax}} </td>
                        <td> {{$purchase->status}} </td>
                        <td> {{$purchase->price}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop