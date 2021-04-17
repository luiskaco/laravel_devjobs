<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
     public function show(Categoria $categoria)
     {
        $vacantes = Vacante::where('categoria_id', $categoria->id)
                            ->where('activa', true)
                            ->simplePaginate(4);


         return view('categoria.show',compact('vacantes','categoria'));
     }
}
