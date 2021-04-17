<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon;
        $salarios = ['0 - 1000 USD', '1000 - 2000 USD', '2000 - 4000 USD', 'No Mostrar' ];

         foreach( $salarios as $value){
            DB::table('salarios')->insert([
                'nombre' => $value,
                'created_at' => $carbon->format('Y-m-d H:i:s'),
                'updated_at' => $carbon->format('Y-m-d H:i:s'),
            ]);
         }
    }
}
