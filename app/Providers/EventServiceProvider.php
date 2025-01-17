<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * O array de eventos a serem ouvidos.
     *
     * @var array
     */
    protected $listen = [
        // Registre aqui os eventos e seus listeners
        // 'App\Events\SomeEvent' => [
        //     'App\Listeners\SomeListener',
        // ],
    ];

    /**
     * Registra quaisquer serviços relacionados a eventos.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
