<?php

namespace App\Providers;

use View;
use App\Categoria;
use Illuminate\Support\ServiceProvider;

class CategoriaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Primero se ejecuta
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Se ejecuta despues


        // Pasamos el view compsoer
        View::composer('*', function($view){
            $categorias = Categoria::all();

            $view->with('categorias', $categorias);

        });

    }
}
