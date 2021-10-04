<?php

namespace App\Providers;

use App\Repositories\CategoriaRepository;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
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
        // $this->app->bind(
        //     'App\Interfaces\PaisInterface',
        //     'App\Repositories\PaisRepository'
        // );

        $this->app->bind(
            CategoriaRepositoryInterface::class,
            CategoriaRepository::class
        );
    }
}