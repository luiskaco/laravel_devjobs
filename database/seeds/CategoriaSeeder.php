<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon;
        $categorias = ['UX / UI', 'Front End', 'Back end', 'deVops','TechLeader','DBA'];

         foreach( $categorias as $value){
            DB::table('categorias')->insert([
                'nombre' => $value,
                'created_at' => $carbon->format('Y-m-d H:i:s'),
                'updated_at' => $carbon->format('Y-m-d H:i:s'),
            ]);
         }
    }
}
