@extends('layouts.app', ['title' => 'Pokémon', 'brandName' => 'Resultado Pokémon'])

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('pokemon.index')}}" class="text-end">VOLTAR</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$pokemon['name']}}</h5>
                    <hr>
                    <h6 class="card-subtitle fw-bold">Habilidades</h6>
                    @foreach($additional->abilities as $key=>$abilities)
                        <p>{{$key+1}} - {{$abilities->ability->name}}</p>
                    @endforeach
                    <h6>experiência base: {{$additional->base_experience}}</h6>
                    <div class="row">
                        <img style="width: 200px;" src="{{$additional->sprites->front_default}}" alt="Não localizado" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')

@endpush
