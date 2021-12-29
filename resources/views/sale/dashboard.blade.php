@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/sale/login.css')}}">
@endpush

@section('content')
    <div class="container">
       <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nova venda</h5>
                        <p class="card-text">Realizar Venda.</p>
                        <a href="{{route('sale.create')}}" class="card-link">Realizar Venda</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Produtos</h5>
                        <p class="card-text">Listar e Adicionar novos produtos.</p>
                        <a href="{{route('product.index')}}" class="card-link">Clique aqui</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Lista Clientes</h5>
                        <p class="card-text">Lista todos os clientes cadastrados</p>
                        <a href="{{route('customer.index')}}" class="card-link">Listar</a>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection
