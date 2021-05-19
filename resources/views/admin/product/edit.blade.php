@extends('adminlte::page')

@section('title', 'Product | Edit')

@section('content_header')
    <h1><strong>Products</strong></h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
                    @csrf     
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name', $product->name)}}">
                        @error('name')
                            <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Sale price</label>
                        <input type="number" class="form-control" name="sell_price" id="sell_price" value="{{old('sell_price', $product->sell_price)}}">
                        @error('sell_price')
                            <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    @if ($category->id == $product->category_id)
                                        selected
                                    @endif
                                    >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="provider_id">Provider</label>
                        <select class="form-control" name="provider_id" id="provider_id">                            
                            @foreach ($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" name="picture" id="picture" class="custom-file-input">
                            <label for="picture" class="custom-file-label">Seleccionar</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                    <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a>
                </form>
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