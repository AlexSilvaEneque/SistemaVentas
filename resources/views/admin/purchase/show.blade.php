@extends('adminlte::page')

@section('title', 'Purchase | Details')

@section('content_header')
    <h1><strong>Purchase Details</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header row">
            <div class="col-md-6 text-center">
                <span class="d-block text-bold">Provider</span>
                <span>{{$purchase->provider->name}}</span>
            </div>
            <div class="col-md-6 text-center">
                <span class="d-block text-bold">Purchase number</span>
                <span>{{$purchase->id}}</span>
            </div>
        </div>
        <div class="card-body row">
            <h5 class="card-title mb-3">Details</h5>
            <div class="table-responsive">
                <table class="table table-stripe">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseDetails as $purchaseDetail)
                            <tr>
                                <td>{{$purchaseDetail->product->name}}</td>
                                <td>{{$purchaseDetail->price}}</td>
                                <td>{{$purchaseDetail->quantity}}</td>
                                <td>S/ {{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">
                                <p class="text-right">SUBTOTAL:</p>
                            </th>
                            <th>
                                <p class="text-right">S/ {{number_format($subtotal,2)}}</p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <p class="text-right">TOTAL IMPUESTO({{$purchase->tax}}%):</p>
                            </th>
                            <th>
                                <p class="text-right">S/ {{number_format($subtotal*$purchase->tax/100,2)}}</p>
                            </th>
                        </tr>                        
                        <tr>
                            <th colspan="3">
                                <p class="text-right">TOTAL:</p>
                            </th>
                            <th>
                                <p class="text-right">S/ {{number_format($purchase->total,2)}}</p>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('purchases.index') }}" class="btn btn-primary">Previus</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop