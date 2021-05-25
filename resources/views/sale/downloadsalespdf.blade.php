<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container">

        <img src="{{ asset('images/modulartop.png') }}" alt="" srcset="">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Fecha de venta</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">ID de factura</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $key => $sale)
                <tr>
                    <th>{{ $key += 1 }}</th>
                    <td>{{ ucfirst($sale->sellerName) }} {{ ucfirst($sale->sellerLastName) }}</td>
                    <td>{{ $sale->saleDate }}</td>
                    <td>{{ ucfirst($sale->buyerName) }} {{ ucfirst($sale->buyerLastName) }}</td>
                    <td>{{ $sale->invoiceId }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</body>
</html>



