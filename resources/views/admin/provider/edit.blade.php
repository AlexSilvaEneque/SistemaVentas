@extends('adminlte::page')

@section('title', 'Provider | Edit')

@section('content_header')
    <h1>Providers</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('providers.update', $provider)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row px-2">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name', $provider->name)}}">
                            @error('name')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>

                        <input type="hidden" name="slug" id="slug">

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email', $provider->email)}}">
                            @error('email')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ruc">Ruc</label>
                            <input type="text" name="ruc_number" id="ruc" class="form-control" placeholder="Ruc" value="{{old('ruc_number', $provider->ruc_number)}}">
                            @error('ruc_number')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{old('address', $provider->address)}}">
                            @error('address')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{old('phone', $provider->phone)}}">
                            @error('phone')
                                <small class="text-danger">*{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ml-3 px-4 py-2 mr-2">Send</button>
                        <a href="{{route('providers.index')}}" class="btn btn-danger px-4 py-2">Cancel</a>
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
    <script type="text/javascript">
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop