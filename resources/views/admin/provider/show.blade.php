@extends('adminlte::page')

@section('title', 'Providers | Details')

@section('content_header')
    <h1><strong>Provider</strong></h1>    
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-4 text-center mb-4">
                    <h4 class="mb-3"><strong>{{$provider->name}}</strong></h4>
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">About the provider</button>
                        <button type="button" class="list-group-item list-group-item-action">Products</button>
                        <button type="button" class="list-group-item list-group-item-action">Register Product</button>
                    </div>                 
                </div>
                <div class="col-md-8 pl-4">
                    <h4 class="mb-4"><strong>Provider information</strong></h4>
                    <h6><i class="fas fa-map-marked-alt mr-2"></i><strong>Address</strong></h6>
                    <label for="" class="ml-4 text-gray">{{$provider->address}}</label>                    
                    <hr class="text-center text-md-left" style="border-top: 1px solid black; margin: -8px 50% 10px 10px">
                    <h6><i class="fas fa-phone mr-2"></i><strong>Phone</strong></h6>
                    <label for="" class="ml-4 text-gray"">{{$provider->phone}}</label>
                    <hr class="text-center text-md-left" style="border-top: 1px solid black; margin: -8px 50% 10px 10px">
                    <h6><i class="fas fa-envelope mr-2"></i><strong>Email</strong></h6>
                    <label for="" class="ml-4 text-gray"">{{$provider->email}}</label>
                    <hr class="text-center text-md-left" style="border-top: 1px solid black; margin: -8px 50% 10px 10px">
                    <h6><i class="fas fa-address-book mr-2"></i><strong>Ruc</strong></h6>
                    <label for="" class="ml-4 text-gray"">{{$provider->ruc_number}}</label>                    
                    <hr class="text-center text-md-left" style="border-top: 1px solid black; margin: -8px 50% 10px 10px">
                    <h6><i class="fas fa-calendar-alt mr-2"></i><strong>Registration date</strong></h6>                    
                    <label for="" class="ml-4 text-gray"">{{$provider->created_at}}</label>
                    <hr class="text-center text-md-left" style="border-top: 1px solid black; margin: -8px 50% 10px 10px">
                </div>                
            </div>
            <div class="card-footer text-right">
                <a href="{{route('providers.index')}}" class="btn btn-primary">Previus</a>
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