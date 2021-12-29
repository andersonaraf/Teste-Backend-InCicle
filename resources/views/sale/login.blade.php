@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/sale/login.css')}}">
@endpush

@section('content')
    <div class="container text-center">
        <main class="form-signin">
            <form method="post" action="{{route('login.authenticate')}}">
                @csrf
                <img class="mb-4" src="{{asset('css/sale/img/icon.png')}}" alt=""
                     width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Controlador de Vendas</h1>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                           placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                           placeholder="Senha">
                    <label for="floatingPassword">Senha</label>
                </div>
                @error('authenticate')
                <div class="mt-2">
                    <label class="alert-danger form-control">{{$message}}</label>
                </div>
                @enderror
                <div class="checkbox mb-3 mt-3">
                    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Entrar"/>
                </div>
            </form>
        </main>
    </div>
@endsection
