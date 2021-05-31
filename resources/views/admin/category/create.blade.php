@extends('adminlte::page')

@section('title', 'Categories | Create')

@section('content_header')
    <h1>Register Categories</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                        @error('name')
                            <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>
                        @error ('slug')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <input type="hidden" name="slug" id="slug">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description">{{old('description')}}</textarea>
                        @error('description')
                            <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" id="btn" class="btn btn-primary py-2 px-4 mr-2">Send</button>
                    <a href="{{route('categories.index')}}" class="btn btn-danger text-white py-2 px-4">Cancel</a>
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
    {{-- llamamos al plugin de jquery --}}
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