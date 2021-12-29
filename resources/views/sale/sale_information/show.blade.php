@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/sale/login.css')}}">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-end mb-2">
                <a href="{{route('dash-board.index')}}"><input type="button" class="btn btn-outline-info" value="Voltar"></a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Comprador: {{$sale->customer->name}}</h5>
                    <p class="fw-bold ">Valor Total: R$ R$ {{number_format($sale->total_price, 2, ',', ' ')}}</p>
                    <p class="fw-bold ">Data da Compra: {{date_format(date_create($sale->buy_date), 'd/m/Y')}}</p>
                    <a href="{{route('sale.pdf', $sale->id)}}">Download das Informações</a>
                </div>
            </div>
        </div>
    </div>
@endsection
