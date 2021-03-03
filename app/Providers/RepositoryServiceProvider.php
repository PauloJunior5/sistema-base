<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.

        /**
         * 
         * Binding - Países
         * 
         */
        $this->app->bind(
            'App\Interfaces\PaisInterface',
            'App\Repositories\PaisRepository'
        );

        /**
         * 
         * Binding - Estados
         * 
         */
        $this->app->bind(
            'App\Interfaces\EstadoInterface',
            'App\Repositories\EstadoRepository'
        );

        /**
         * 
         * Binding - Cidades
         * 
         */
        $this->app->bind(
            'App\Interfaces\CidadeInterface',
            'App\Repositories\CidadeRepository'
        );

        /**
         * 
         * Binding - Contratos
         * 
         */
        $this->app->bind(
            'App\Interfaces\ContratoInterface',
            'App\Repositories\ContratoRepository'
        );
    }
}