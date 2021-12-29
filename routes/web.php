<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::prefix('/administrativo')->group(function (){
    Route::get('login', [\App\Http\Controllers\Sale\LoginController::class, 'index'])->name('login.index');
    Route::post('logar', [\App\Http\Controllers\Sale\LoginController::class, 'authenticate'])->name('login.authenticate');

    Route::get('inicio', [\App\Http\Controllers\Sale\DashBoardController::class, 'index'])->name('dash-board.index');

    Route::get('produtos', [\App\Http\Controllers\Sale\ProductController::class, 'index'])->name('product.index');
    Route::post('produtos/salvar', [\App\Http\Controllers\Sale\ProductController::class, 'store'])->name('product.store');

    Route::get('clientes', [\App\Http\Controllers\Sale\CustomerController::class, 'index'])->name('customer.index');
    Route::post('clientes/salvar', [\App\Http\Controllers\Sale\CustomerController::class, 'store'])->name('customer.store');
    Route::get('clientes/compras/{id}', [\App\Http\Controllers\Sale\CustomerController::class, 'show'])->name('customer.show');

    Route::get('nova/venda', [\App\Http\Controllers\Sale\SaleController::class, 'create'])->name('sale.create');

    Route::get('venda/finalizada/{id}', [\App\Http\Controllers\Sale\SaleController::class, 'show'])->name('sale.show');

    Route::get('/informacao/pdf/{id}', [\App\Http\Controllers\Sale\SaleController::class, 'downloadPDF'])->name('sale.pdf');
});


Route::prefix('/pokemon')->group(function (){
    Route::get('index', [\App\Http\Controllers\Pokemon\PokemonController::class, 'index'])->name('pokemon.index');
    Route::post('buscar', [\App\Http\Controllers\Pokemon\PokemonController::class, 'search'])->name('pokemon.search');

});

