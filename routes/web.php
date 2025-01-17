<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BuscaProdutos;
use App\Http\Controllers\ProdutoController;

// Rota padrão para a página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rota para o componente Livewire de busca de produtos
Route::get('/busca-produtos', BuscaProdutos::class)->name('busca-produtos');


Route::get('/produtos/criar', function () {
    return view('produtos.create');
})->name('produtos.create');

// Rota para criar o produto (POST)
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

