<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Produto; // Importa o modelo Produto
use App\Observers\ProdutoObserver; // Importa o Observer ProdutoObserver

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra qualquer serviço de aplicação.
     */
    public function register(): void
    {
        //
    }

    /**
     * Registra quaisquer eventos ou serviços durante o boot da aplicação.
     */
    public function boot(): void
    {
        // Vincula o Observer ao Modelo Produto
        Produto::observe(ProdutoObserver::class);
    }
}
