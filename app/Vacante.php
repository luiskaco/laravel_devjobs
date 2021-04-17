<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id'

    ];

    /**
     *  Nota: no se agrega los que tienen valores por default
     */


     // Relacion 1: 1  | una vacante tiene una categoria
     public function categoria()
     {
         return $this->belongsTo(Categoria::class);
     }

      // Relacion 1: 1  | una vacante tiene una salario
     public function salario()
     {
         return $this->belongsTo(Salario::class, 'salario_id');
     }

     // Relacion 1: 1  | una vacante tiene una ubicacion
     public function ubicacion()
     {
         return $this->belongsTo(Ubicacion::class);
     }

     // Relacion 1: 1  | una vacante tiene una experiencia
     public function experiencia()
     {
         return $this->belongsTo(Experiencia::class);
     }


     // Relacion 1:1 | Reclueta publica una vacante
     public function reclutador()
     {
         return $this->belongsTo(User::class, 'user_id');
     }

     // RElacion 1:n | Vacanrte  y candidat
     public function candidato(){
        return $this->hasMany(Candidato::class);
     }
}
