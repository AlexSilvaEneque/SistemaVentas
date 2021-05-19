@extends('adminlte::page')

@section('title', 'Product | Details')

@section('content_header')
    <h1><strong>Product</strong></h1>    
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-4 text-center mb-4">
                    <img src="{{ asset('image/'.$product->image) }}" class="img-thumbnail" alt="">
                    <h4 class="mb-3"><strong>{{$product->name}}</strong></h4>
                    <div class="list-group mt-4">
                        <p class="row">
                            <span class="col text-left"><strong>Status</strong></span>
                            <span class="col text-right text-muted">{{ $product->status }}</span>
                        </p>
                        <p class="row">
                            <span class="col text-left"><strong>Provider</strong></span>
                            <span class="col text-right text-muted"><a href="{{ route('providers.show', $product->provider) }}">{{ $product->provider->name }}</a></span>
                        </p>
                        <p class="row">
                            <span class="col text-left"><strong>Category</strong></span>
                            <span class="col text-right text-muted">{{ $product->category->name }}</span>
                        </p>
                        @if ($product->status == 'ACTIVE')
                        <button type="button" class="btn btn-success"> {{ $product->status }} </button>
                        @else
                        <button type="button" class="btn btn-danger"> {{ $product->status }} </button>
                        @endif
                    </div>
                    
                </div>

                <div class="col-md-8 pl-4">
                    <h4 class="mb-4"><strong>Product information</strong></h4>
                    <div class="row px-4">
                        <div class="col-md-6">
                            <h6><i class="fas fa-barcode mr-2"></i><strong>Product code</strong></h6>
                            <span for="" class="ml-4 text-muted">{{$product->code}}</span>                    
                            <hr class="mt-0 mb-4" style="border-top: 1px solid black">
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-file mr-2"></i><strong>Product stock</strong></h6>
                            <span for="" class="ml-4 text-muted">{{$product->stock}}</span>
                            <hr class="mt-0 mb-4" style="border-top: 1px solid black">
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-money-check-alt mr-2"></i><strong>Product price</strong></h6>
                            <span for="" class="ml-4 text-muted">{{$product->sell_price}}</span>                    
                            <hr class="mt-0 mb-4" style="border-top: 1px solid black">
                        </div>                        
                    </div>
                </div>                
            </div>
            <div class="card-footer text-right">
                <a href="{{route('products.index')}}" class="btn btn-primary">Previus</a>
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