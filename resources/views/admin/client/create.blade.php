@extends('adminlte::page')

@section('title', 'Client | Create')

@section('content_header')
    <h1>Clients</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('clients.store')}}" method="POST">
                    @csrf
                    <div class="row px-2">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}">
                            @error('name')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <input type="hidden" name="slug" id="slug">
                        <div class="form-group col-md-6">
                            <label for="dni">Dni</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni" value="{{old('dni')}}">
                            @error('dni')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ruc">Ruc</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" placeholder="Ruc" value="{{old('ruc')}}">
                            @error('ruc')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{old('address')}}">
                            @error('address')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{old('phone')}}">
                            @error('phone')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ml-3 px-4 py-2 mr-2">Send</button>
                        <a href="{{route('clients.index')}}" class="btn btn-danger px-4 py-2">Cancel</a>
                    </div>
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
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#name').stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut:'#slug',
                space: '-'
            });
        });
    </script>
@stop