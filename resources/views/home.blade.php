@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Opções</div>

                <div class="card-body">
                   <div class="row mx-auto">
                       <div class="col col-md-6 col-lg-6 col-12">
                           <div class="card" style="width: 18rem;">
                               <div class="card-body">
                                   <h5 class="card-title">Sistema para vendas.</h5>
                                   <p class="card-text">Controlador de vendas diárias utilizando apis rest.</p>
                                   <a href="{{route('login.index')}}" class="card-link">Acessar</a>
                               </div>
                           </div>
                       </div>

                       <div class="col col-md-6 col-lg-6 col-12">
                           <div class="card" style="width: 18rem;">
                               <div class="card-body">
                                   <h5 class="card-title">Informações de Pokemon</h5>
                                   <p class="card-text">Cadastrar 1000 pokemons na base de dados e retorna suas informações.</p>
                                   <a href="#" class="card-link">Acessar</a>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
