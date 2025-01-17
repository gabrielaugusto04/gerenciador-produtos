<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Produto;
use App\Observers\ProdutoObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Registra serviços da aplicação.
     */
    public function register(): void
    {
        //
    }

    /**
     * Registra os Observers durante o boot da aplicação.
     */
    public function boot(): void
    {
        // Vincula o Observer ao Modelo Produto
        Produto::observe(ProdutoObserver::class);
    }
}
