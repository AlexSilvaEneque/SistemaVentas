@extends('adminlte::page')

@section('title', 'Sales | Create')

@section('content_header')
    <h1>Sales Register</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="client_id">Client</label>
                            <select name="client_id" id="client_id" class="form-control">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tax">Tax</label>
                            <input type="text" name="tax" id="tax" class="form-control" placeholder="18%">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="" disabled selected>Seleccione un producto</option>
                                @foreach ($products as $product)                                   
                                    <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->sell_price }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stock">Current product stock</label>
                            <input type="text" name="stock" id="stock" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control">
                        </div>
                        <div class="form group col-md-6">
                            <label for="price">Sale price</label>
                            <input type="text" name="price" id="price" class="form-control" value="" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="discount">Discount</label>
                            <input type="number" name="discount" id="discount" class="form-control" value="0">
                        </div>
                        <div class="form-group col-12 text-right">
                            <button type="button" id="agregar" class="btn btn-success">Add Sale</button>
                        </div>

                        <div class="form-group col-12">
                            <h4 class="card-title">Sales details</h4>
                            <div class="table-responsive">
                                <table id="detalles" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Delete</th>
                                            <th>Product</th>
                                            <th>Sales price</th>
                                            <th>Discount</th>
                                            <th>Quantity</th>
                                            <th>SubTotal</th>
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
                                        <tr>
                                            <th colspan="4">
                                                <p class="text-right">TOTAL IMPUESTO (<span id="tax_inp"></span>%)</p>
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
                                                <p class="text-right"><span class="text-right" id="total_pagar_html">0.00</span><input type="hidden" name="total" id="total_pagar"></p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="guardar" class="btn btn-primary px-4 py-2 mr-2">Send</button>
                        <a href="{{ route('sales.index') }}" class="btn btn-light px-4 py-2">Cancel</a>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        
        
        $(document).ready(function () {
            $('#agregar').click(function () {
                agregar();
            });
        });
        
        var cont = 1;
        var total = 0;
        subtotal = [];

        $('#guardar').hide();
        $('#product_id').change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $('#price').val(datosProducto[2]);
            $('#stock').val(datosProducto[1]);
        }

        function agregar() {
            datosProducto = document.getElementById('product_id').value.split('_');
            product_id = datosProducto[0];
            producto = $('#product_id option:selected').text();
            quantity = $('#quantity').val();
            discount = $('#discount').val();
            price = $('#price').val();
            stock = $('#stock').val();
            impuesto = $('#tax').val();

            if (product_id != "" && quantity != "" && quantity > 0 && discount !="" && price != "") {
                if (parseInt(stock) >= parseInt(quantity)) {
                    subtotal[cont] = (quantity * price) - (quantity*price*discount/100);
                    total = total + subtotal[cont];
                    var fila = '<tr class = "selected" id = "fila'+cont+'"><td><button type="button" class = "btn btn-danger" onclick="eliminar('+cont+');"><i class = "fas fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td><td><input type="hidden" id="price[]" name="price[]" value="'+parseInt(price).toFixed(2)+'"><input class="form-control" type="number" id="price[]" value="'+parseFloat(price).toFixed(2)+'" disabled></td><td><input type="hidden" name="discount[]" value="'+parseFloat(discount)+'"><input class="form-control" type="number" value="'+parseFloat(discount)+'" disabled></td><td><input type="hidden" name="quantity[]" value="'+quantity+'"><input class="form-control" type="number" value="'+quantity+'" disabled></td><td align="right">S/'+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
                    cont++;
                    $('#tax_inp').html(impuesto);
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        icon: 'error',
                        'text': 'La cantidad solicitada supera al stock del producto'
                    });
                }
                
            } else {
                Swal.fire({
                    type: 'error',
                    icon: 'error',
                    text: 'Rellene todos los campos del detalle de la venta'
                })
            }
        }

        function limpiar() {
            $('#quantity').val("");
            // $('#price').val("");
            $('#discount').val("0");
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