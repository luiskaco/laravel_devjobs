<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon;
        $experiencias = ['0 a 6 Meses', '6 meses - 1 año', '1 - 3 Años', '3 - 5 Años','5 - 7 Años','7 - 10 años', '10 - 12 Años','12 - 15 Años'];

         foreach( $experiencias as $value){
            DB::table('experiencias')->insert([
                'nombre' => $value,
                'created_at' => $carbon->format('Y-m-d H:i:s'),
                'updated_at' => $carbon->format('Y-m-d H:i:s'),
            ]);
         }
    }
}
