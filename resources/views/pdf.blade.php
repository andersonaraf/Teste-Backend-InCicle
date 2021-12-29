<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações de Compra</title>
</head>
<body>
<div style="text-align: center">
    <h2 class="card-title">Comprador: {{$sale->customer->name}}</h2>

    <p class="fw-bold ">Data da Compra: {{date_format(date_create($sale->buy_date), 'd/m/Y')}}</p>
    <hr>
    <label>Lista de Pedidos</label><br>
    @foreach($sale->salesInformation as $salesInformation)
        <label>Produto: <b>{{$salesInformation->product->name}}</b> | Quantidade: <b>{{$salesInformation->amount}}</b> | Preço: <b>{{number_format(($salesInformation->amount * $salesInformation->product->price), 2, ',', ' ')}}</b></label><br>
    @endforeach
    <p>Valor Total da Compra: R$ R$ <b>{{number_format($sale->total_price, 2, ',', ' ')}}</b></p>
    <hr>
</div>
</body>
</html>
