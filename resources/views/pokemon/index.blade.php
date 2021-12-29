@extends('layouts.app', ['title' => 'Pokémon', 'brandName' => 'Pokémon'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5>Buscar Pokemon</h5>
                    <form class="row" method="post" action="{{route('pokemon.search')}}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nome do Pokémon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="namePokemon" placeholder="Pikachu" required>
                                @error('nameError')
                                <label class="alert-danger">{{$message}}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="click" class="btn btn-primary mb-3">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
