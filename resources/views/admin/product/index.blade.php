@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
    <div class="container pt-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td> {{$product->id}} </td>
                        <td> {{$product->code}} </td>
                        <td> {{$product->name}} </td>
                        <td> {{$product->stock}} </td>
                        <td> {{$product->sell_price}} </td>
                        <td> {{$product->status}} </td>
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