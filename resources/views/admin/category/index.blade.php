@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <div class="container mt-2">
        {{-- <button type="button" class="btn btn-outline-primary text-lg"><a href="{{route('category.create')}}"><i class="bi bi-plus-circle-fill"></i></a></button> --}}
        <a href="{{route('category.create')}}" class="btn btn-outline-primary"><i class="bi bi-plus-circle-fill" style="font-size: 1.2em;"></i></a>
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
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td> {{$category->id}} </td>
                                <td> {{$category->name}} </td>
                                <td> {{$category->description}} </td>
                                <td>
                                    <div class="container d-flex">
                                        <a href="{{route('category.edit', $category)}}" class="btn btn-outline-success mr-2"><i class="bi bi-pencil-square"></i></a>

                                        <form action="{{route('category.destroy', $category)}}" method="POST">
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