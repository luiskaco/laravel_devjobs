<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon;
        $ubicacions = ['Remoto','USA', 'Canada', 'Mexico', 'Colombia', 'Argentina', 'España' ];

         foreach( $ubicacions as $value){
            DB::table('ubicacions')->insert([
                'nombre' => $value,
                'created_at' => $carbon->format('Y-m-d H:i:s'),
                'updated_at' => $carbon->format('Y-m-d H:i:s'),
            ]);
         }
    }
}
