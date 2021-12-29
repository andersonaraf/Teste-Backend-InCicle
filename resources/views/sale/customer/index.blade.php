@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/sale/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endpush

@section('content')
    <div class="container">
        <div class="text-end mb-2">
            <a href="{{route('dash-board.index')}}"><input type="button" class="btn btn-info fw-bold" value="Voltar"></a>
        </div>

        <div class="row">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Número Documento</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->type}}</td>
                        <td>{{$customer->document}}</td>
                        <td>
                            <a href="{{route('customer.show', $customer->id)}}">Compras</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Número Documento</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script src="{{asset('js/mask/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

        var cpfMascara = function (val) {
                return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
            },
            cpfOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(cpfMascara.apply({}, arguments), options);
                }
            };
        $('.mascara-cpfcnpj').mask(cpfMascara, cpfOptions);
    </script>
@endpush
