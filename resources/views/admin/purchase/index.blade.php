@extends('adminlte::page')

@section('title', 'Purchase')

@section('content_header')
    <h1><strong>Purchase</strong></h1>
@stop

@section('content')
        <a href="{{ route('purchases.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus-circle" style="font-size: 1.2em;"></i></a>
        <div class="card mt-2">
            <div class="card-body">
                <table id="purchase" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td> <a href="{{route('purchases.show', $purchase)}}"> {{$purchase->id}} </a></td>
                                <td> {{$purchase->purchase_date}} </td>
                                <td> {{$purchase->total}} </td>
                                <td> {{$purchase->status}} </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('purchases.pdf', $purchase) }}" class="text-primary mr-1"><i class="far fa-file-pdf"></i></a>
                                        <a href="#" class="text-secondary mr-1"><i class="fas fa-print"></i></a>
                                        <a href="{{ route('purchases.show', $purchase) }}" class="text-info"><i class="far fa-eye"></i></a>
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
            $('#purchase').DataTable({
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