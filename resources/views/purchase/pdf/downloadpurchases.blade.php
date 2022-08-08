<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}">
</head>
<body>

    <div class="">
        <img src="{{ public_path('images/modulartop.png') }}" alt="" srcset="">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Fecha de compra</th>
                    <th scope="col">ID de factura</th>
                    <th scope="col">Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchases as $key => $purchase)
                <tr>
                    <th>{{ $key += 1 }}</th>
                    <td>{{ ucfirst($purchase->provider) }}</td>
                    <td>{{ $purchase->purchase_date }}</td>
                    <td>{{ ucfirst($purchase->id_invoice) }}</td>
                    <td>{{ $purchase->observations }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    
</body>
</html>