@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/sale/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endpush

@section('content')
    <div class="container">
        <div class="text-end mb-2">
            @include('sale.product.create')
            <a href="{{route('dash-board.index')}}"><input type="button" class="btn btn-info fw-bold" value="Voltar"></a>
        </div>

        <div class="row">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>R$ {{number_format($product->price, 2, ',', ' ')}}</td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
