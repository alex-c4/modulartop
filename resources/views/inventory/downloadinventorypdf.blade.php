<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="">

        <img src="{{ asset('images/modulartop.png') }}" alt="" srcset="">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Acabado</th>
                    <th>Ancho/Espesor/Largo</th>
                    <th>Material</th>
                    <th>Sustrato</th>
                    <th>P.V.P</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventory as $key => $item)
                <tr>
                    <th>{{ $key += 1 }}</th>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->productName }}</td>
                    <td>{{ $item->productType }}</td>
                    <td>{{ $item->productAcabado }}</td>
                    <td>{{ $item->width }}/{{ $item->thickness }}/{{ $item->length }}</td>
                    <td>{{ $item->productMaterial }}</td>
                    <td>{{ $item->productSustrato }}</td>
                    <td>{{ $item->price }}</td>
                    <th>{{ $item->invQuantity }}</th>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</body>
</html>



