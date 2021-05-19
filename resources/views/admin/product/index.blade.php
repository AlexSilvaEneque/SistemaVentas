@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1><strong>Products</strong></h1>
@stop

@section('content')
    <div class="container pt-4">
        <a href="{{route('products.create')}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle" style="font-size: 1.2em;"></i></a>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td> {{$product->id}} </td>
                                <td> <a href="{{route('products.show', $product)}}"> {{$product->name}} </a></td>
                                <td> {{$product->stock}} </td>
                                <td> {{$product->status}} </td>
                                <td> {{$product->category->name}} </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('products.edit', $product)}}" class="btn btn-outline-success mr-2"><i class="far fa-edit"></i></a>
                                        <form action="{{route('products.destroy', $product)}}" method="POST">
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