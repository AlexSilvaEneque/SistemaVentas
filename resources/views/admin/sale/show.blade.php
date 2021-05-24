@extends('adminlte::page')

@section('title', 'Sales | Detail')

@section('content_header')
    <h1>Sales Detail</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header row">
            <div class="col-md-4 text-center">
                <label for="" class="d-block">Client</label>
                <a href="{{ route('clients.show', $sale->client) }}"><span>{{ $sale->client->name }}</span></a>
            </div>
            <div class="col-md-4 text-center">
                <label for="" class="d-block">Seller</label>
                <span>{{ $sale->user->name }}</span>
            </div>
            <div class="col-md-4 text-center">
                <label for="" class="d-block">Sale number</label>
                <span>{{ $sale->id }}</span>
            </div>
        </div>
        <div class="card-body row">
            <div class="table-responsive">
                <table id="detalles" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Sales price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saleDetails as $saleDetail)
                            <tr>
                                <td>{{ $saleDetail->product->name }}</td>
                                <td>{{ $saleDetail->price }}</td>
                                <td>{{ $saleDetail->discount }}</td>
                                <td>{{ $saleDetail->quantity }}</td>
                                <td>S/ {{ number_format($saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">
                                <p class="text-right">SUB TOTAL:</p>
                            </th>
                            <th>
                                <p class="text-right"><span>{{ number_format($subtotal, 2) }}</span></p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <p class="text-right">TOTAL IMPUESTO({{$sale->tax}}%)</p>
                            </th>
                            <th>
                                <p class="text-right"><span>{{ number_format($subtotal * $sale->tax / 100, 2) }}</span></p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <p class="text-right">TOTAL PAGAR</p>
                            </th>
                            <th>
                                <p class="text-right"><span>S/ {{ number_format($sale->total, 2) }}</span></p>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>                       
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('sales.index') }}" class="btn btn-primary">Previus</a>
        </div> 
    </div>    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop