<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Venta</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        header {
            margin-bottom: 20px;
            margin-top: 30px;
        }
        .article-art-1 {
            margin-bottom: 20px;
        }

        .table-art-1 {
            border-collapse: collapse;
            width: 100%;
        }      

        .table-data {
            border-collapse: collapse;
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .t-header {
            background-color: #29877E;
            height: 30px;
            padding: 0;
            margin: 0;
        }
        .table-header {
            color: #fff;
        }
        .tr-body {
            height: 100px;
            text-align: center;
        }
        .p-foot {
            text-align: right;
            height: 30px;
        }

        thead th {
            height: 50px;
        }

        table td {
            height: 70px;
        }
    </style>
</head>
<body>
    <header>       
        <table class="table-art-1">
            <thead>
                <tr>
                    <th>DATOS DEL VENDEDOR</th>
                    <th>NÚMERO DE VENTA<th>
                </tr>
            </thead>
            <tr class="tr-body">
                <td>
                    <div style="display: flex;">
                        <p style="width: 50%; text-align: left; padding-left: 12px"><strong>Nombre:</strong></p>
                        <p style="margin-left: 50%; text-align: right; padding-right: 20px">{{ $sale->user->name }}</p>
                    </div>
                    <div style="display: flex">
                        <p style="width: 50%; text-align: left; padding-left: 12px"><strong>Email: </strong></p>
                        <p style="margin-left: 50%; text-align: right; padding-right: 20px">{{ $sale->user->email }}</p>
                    </div>                    
                </td>
                <td>
                    <p>{{ $sale->id }}</p>
                </td>
            </tr>            
        </table>
    </header>
    <section>
        <article>
            <table class="table-data">
                <thead>
                    <tr class="t-header">
                        <th class="table-header">CANTIDAD</th>
                        <th class="table-header">PRODUCTO</th>
                        <th class="table-header">PRECIO VENTA</th>
                        <th class="table-header">DESCUENTO(%)</th>
                        <th class="table-header">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr class="tr-body">
                            <td>{{ $saleDetail->quantity }}</td>
                            <td>{{ $saleDetail->product->name }}</td>
                            <td>{{ $saleDetail->price }}</td>
                            <td>{{ number_format($saleDetail->discount) }}</td>
                            <td>{{ number_format($saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100, 2) }}</td>                        
                        </tr>
                    @endforeach                    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p class="p-foot">SUBTOTAL:</p>
                        </th>
                        <th>
                            <p class="p-foot">s/ {{ number_format($subtotal, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p class="p-foot">TOTAL IMPUESTO({{ number_format($sale->tax) }}%):</p>
                        </th>
                        <th>
                            <p class="p-foot">s/ {{ number_format($subtotal * $sale->tax/100, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p class="p-foot">TOTAL PAGAR:</p>
                        </th>
                        <th>
                            <p class="p-foot">s/ {{ number_format($sale->total, 2) }}</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </article>
    </section>
</body>
</html>