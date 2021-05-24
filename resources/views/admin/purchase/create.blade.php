@extends('adminlte::page')

@section('title', 'Purchase | Register')

@section('content_header')
    <h1><strong>Register</strong></h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('purchases.store') }}" method="POST">
                    @csrf
                    <div class="for-group">
                        <label for="provider_id">Provider</label>
                        <select name="provider_id" id="provider_id" class="form-control">
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}"> {{$provider->name}} </option>                                
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="tax">Tax</label>
                        <input type="number" name="tax" id="tax" class="form-control" value="{{ old('tax') }}" placeholder="18%">
                        @error('tax')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="provider_id">Product</label>
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"> {{$product->name}} </option>                                
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}">
                        @error('quantity')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Purchase price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                        @error('price')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group text-right">
                        <button type="button" id="agregar" class="btn btn-success">Add Product</button>
                    </div>

                    <div class="form-group">
                        <h4 class="card-title">Details</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Delete</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p class="text-right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p class="text-right"><span id="total">0.00</span></p>
                                        </th>
                                    </tr>
                                    <tr id="dvOcultar">
                                        <th colspan="4">
                                            <p class="text-right">TOTAL IMPUESTO (18%)</p>
                                        </th>
                                        <th>
                                            <p class="text-right"><span id="total_impuesto">0.00</span></p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p class="text-right">TOTAL PAGAR</p>
                                        </th>
                                        <th>
                                            <p class="text-right"><span id="total_pagar_html">0.00</span><input type="hidden" name="total" id="total_pagar"></p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="guardar" class="btn btn-primary px-4 py-2 mr-2">Register</button>
                        <a href="{{ route('purchases.index') }}" class="btn btn-light px-4 py-2">Cancel</a>
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
    <script>

        $(document).ready(function () {
            $('#agregar').click(function () {
                agregar();
            });
        });
        
        var cont = 0;
        var total = 0;
        subtotal = [];

        $('#guardar').hide();

        function agregar() {
            product_id = $('#product_id').val();
            producto = $('#product_id option:selected').text();
            quantity = $('#quantity').val();
            price = $('#price').val();
            impuesto = $('#tax').val();

            if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
                subtotal[cont] = quantity * price;
                total = total + subtotal[cont];
                var fila = '<tr class = "selected" id = "fila'+cont+'"><td><button type="button" class = "btn btn-danger" onclick="eliminar('+cont+');"><i class = "fas fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td><td><input type="hidden" id="price[]" name="price[]" value="'+price+'"><input class="form-control" type="number" id="price[]" value="'+price+'" disabled></td><td><input type="hidden" name="quantity[]" value="'+quantity+'"><input class="form-control" type="number" value="'+quantity+'" disabled></td><td align="right">S/'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                console.log('error');
            }
        }

        function limpiar() {
            $('#quantity').val("");
            $('#price').val("");
        }

        function totales() {
            $('#total').html(total.toFixed(2));
            total_impuesto =  total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $('#total_impuesto').html(total_impuesto.toFixed(2));
            $('#total_pagar_html').html(total_pagar.toFixed(2));
            $('#total_pagar').val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $('#guardar').show();
            } else {
                $('#guardar').hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = (total * impuesto) / 100;
            total_pagar_html = total + total_impuesto;
            $('#total').html(total);
            $('#total_impuesto').html(total_impuesto);
            $('#total_pagar_html').html(total_pagar_html);
            $('#total_pagar').val(total_pagar_html.toFixed(2));
            $('#fila'+index).remove();
            evaluar();
        }
    </script>
@stop