@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/sale/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endpush

@section('content')
    <div class="container">
        <div class="text-end mb-2">
            <a href="{{route('customer.index')}}"><input type="button" class="btn btn-info fw-bold"
                                                           value="Voltar"></a>
        </div>

        <div class="row">


            @foreach($customer->sales as $key=>$sale)
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{$key}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{$key}}" aria-expanded="false"
                                    aria-controls="flush-collapse{{$key}}">
                                Compra número: {{$key+1}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$key}}" class="accordion-collapse collapse"
                             aria-labelledby="flush-heading{{$key}}" data-bs-parent="#accordionFlushExample">
                            @foreach($sale->salesInformation as $salesInformation)
                                <div class="accordion-body">
                                    <label>Data da Compra: <b>{{date_format(date_create($sale->buy_date), 'd/m/Y')}}</b></label>
                                    <label>Produto: <b>{{$salesInformation->product->name}}</b> | Quantidade: <b>{{$salesInformation->amount}}</b> | Preço Unitário: R$ {{number_format(($salesInformation->product->price), 2, ',', ' ')}} | Preço Total: <b>{{number_format(($salesInformation->amount * $salesInformation->product->price), 2, ',', ' ')}}</b></label><br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

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

    </script>
@endpush
