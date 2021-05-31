@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle" style="font-size: 1.2em;"></i></a>
    <div class="card mt-2">
        <div class="card-body">
            <table id="category" class="table table-hover">
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
                            <td> <a href="{{ route('categories.show', $category) }}"> {{$category->id}} </a></td>
                            <td> {{$category->name}} </td>
                            <td> {{$category->description}} </td>
                            <td>
                                <div class="container d-flex">
                                    <a href="{{route('categories.edit', $category)}}" class="btn btn-outline-success mr-2"><i class="far fa-edit"></i></a>

                                    <form action="{{route('categories.destroy', $category)}}" method="POST">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#category').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar "+
                            `<select class = "custom-select custom-select.sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="-1">Todo</option>
                            </select>`
                    +" registros por página",
                    "zeroRecords": "No se encontró nada - lo sentimos",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrando de _MAX_ registros totales)",
                    "search": "Buscar:"
                }
            });
        });
    </script>
@stop