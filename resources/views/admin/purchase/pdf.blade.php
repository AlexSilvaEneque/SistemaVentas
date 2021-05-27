<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <th>DATOS DEL PROVEEDOR</th>
                    <th>NÚMERO DE COMPRA</th>
                </tr>
            </thead>
            <tr class="tr-body">
                <td>
                    <div style="display: flex;">
                        <p style="width: 50%; text-align: left"><strong>Nombre:</strong></p>
                        <p style="margin-left: 50%; text-align: right">{{ $purchase->provider->name }}</p>
                    </div>
                    <div style="display: flex">
                        <p style="width: 50%; text-align: left"><strong>Dirección: </strong></p>
                        <p style="margin-left: 50%; text-align: right">{{ $purchase->provider->address }}</p>
                    </div>
                    <div style="display: flex">
                        <p style="width: 50%; text-align: left"><strong>Teléfono: </strong></p>
                        <p style="margin-left: 50%; text-align: right">{{ $purchase->provider->phone }}</p>
                    </div>
                    <div style="display: flex">
                        <p style="width: 50%; text-align: left"><strong>Email: </strong></p>
                        <p style="margin-left: 50%; text-align: right">{{ $purchase->provider->email }}</p>
                    </div>                    
                </td>
                <td>
                    <p>{{ $purchase->id }}</p>
                </td>
            </tr>            
        </table>
    </header>
    <section>
        <article class="article-art-1">
            <table class="table-art-1">
                <thead>
                    <tr class="t-header">
                        <th class="table-header">COMPRADOR</th>
                        <th class="table-header">FECHA COMPRA</th>
                    </tr>                    
                </thead>
                <tbody>
                    <tr class="tr-body">
                        <td>{{ $purchase->user->name }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                    </tr>
                </tbody>
            </table>
        </article>

        <article>
            <table class="table-data">
                <thead>
                    <tr class="t-header">
                        <th class="table-header">CANTIDAD</th>
                        <th class="table-header">PRODUCTO</th>
                        <th class="table-header">PRECIO COMPRA</th>
                        <th class="table-header">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseDetails as $purchaseDetail)
                        <tr class="tr-body">
                            <td>{{ $purchaseDetail->quantity }}</td>
                            <td>{{ $purchaseDetail->product->name }}</td>
                            <td>{{ $purchaseDetail->price }}</td>
                            <td>{{ number_format($purchaseDetail->quantity * $purchaseDetail->price, 2) }}</td>                        
                        </tr>
                    @endforeach                    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p class="p-foot">SUBTOTAL:</p>
                        </th>
                        <th>
                            <p class="p-foot">s/ {{ number_format($subtotal, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p class="p-foot">TOTAL IMPUESTO({{ number_format($purchase->tax) }}%):</p>
                        </th>
                        <th>
                            <p class="p-foot">s/ {{ number_format($subtotal*$purchase->tax/100, 2) }}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p class="p-foot">TOTAL PAGAR:</p>
                        </th>
                        <th>
                            <p class="p-foot">s/ {{ number_format($purchase->total, 2) }}</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </article>
    </section>
</body>
</html>