@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endpush

@section('content')
    <div class="container">

        <div class="row">

        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5>Informações da Compra</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Cliente" required>
                    </div>

                    <div class="mb-3">
                        <label for="document" class="form-label">Cpf ou Cnpj</label>
                        <input type="text" class="form-control mascara-cpfcnpj" id="document" name="document" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="typePayOut" class="form-label">Tipo Pagamento</label>
                        <select class="form-select"  id="typePayOut" name="typePayOut" required>
                            <option value="cash">Dinheiro</option>
                            <option value="creditCard">Cartão de Credito</option>
                        </select>
                    </div>

                    <div class="mb-3 visually-hidden" id="divPayOut">
                        <label for="creditCard" class="form-label">Número do cartão</label>
                        <input type="text" class="form-control " id="creditCard" name="creditCard" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="buyDate" class="form-label">Data da Compra</label>
                        <input type="date" class="form-control" id="buyDate" name="buyDate" required>
                    </div>
                </div>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>R$ {{number_format($product->price, 2, ',', ' ')}}</td>
                        <td>
                            <a data-id="{{$product->id}}" data-name="{{$product->name}}" class="product">Adicionar</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>

        </div>
        <div class="row mt-2">
            <input type="button" class="btn btn-info fw-bold" id="sendPayout" value="Finalizar Compra">
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

        let products = []
        $('.product').click(function () {
            Swal.fire({
                title: 'Informe a quantidade do produto ' + $(this).attr('data-name'),
                input: 'number',
                inputAttributes: {
                    autocapitalize: 'off',
                    placeholder: 1,
                    min: 0
                },
                showCancelButton: true,
                confirmButtonText: 'Adicionar',
                showLoaderOnConfirm: true,
                preConfirm: (value) => {
                    if (value == 0 ) $(this).text('Adicionar');
                    else $(this).text('Adicionar Quantidade: ' + value)
                    let product  = {id: $(this).attr('data-id'), name: $(this).attr('data-name'), amount: value}
                    addProduct($(this).attr('data-id'), product)

                },
            })
        })

        function addProduct(id, product){
            result = products.find( products => products.id == id);
            console.log(result)
            if (result != undefined) {
                result.amount = product.amount
            } else {
                products.push(product)
            }
        }


        $('#typePayOut').change(function () {
            let type = $('#typePayOut').val()
            if (type == "creditCard") {
                $('#divPayOut').removeClass('visually-hidden')
                $('#creditCard').removeAttr('disabled')
            } else {
                $('#divPayOut').addClass('visually-hidden')
                $('#creditCard').attr('disabled', true)
            }
        })


        var cpfMascara = function (val) {
                return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
            },
            cpfOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(cpfMascara.apply({}, arguments), options);
                }
            };
        $('.mascara-cpfcnpj').mask(cpfMascara, cpfOptions);

        $('#creditCard').mask('9999 9999 9999 9999')


        $('#sendPayout').click(function () {
            Swal.fire({
                icon: 'question',
                title: 'Tem que certeza que vai finalizar o pedido ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Sim, salvar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        data: {
                            token: "{{csrf_token()}}",
                            name: $('#name').val(),
                            document: $('#document').val(),
                            type: $('#type').val(),
                            typePayOut: $('#typePayOut').val(),
                            creditCard: $('#creditCard').val(),
                            buyDate: $('#buyDate').val(),
                            products: products,
                        },
                        url: "{{route('payout.save')}}",
                        success: function (response) {
                            console.log(response)
                            window.location.href = "/administrativo/venda/finalizada/" +response
                        },
                        error: function (response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Algo de errado aconteceu, verifique se preencheu todos os cammpos',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                }
            })
        })
    </script>
@endpush

