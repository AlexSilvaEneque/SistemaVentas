@extends('adminlte::page')

@section('title', 'Purchase')

@section('content_header')
    <h1><strong>Purchase</strong></h1>
@stop

@section('content')
        <a href="{{ route('purchases.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus-circle" style="font-size: 1.2em;"></i></a>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-hover">
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop