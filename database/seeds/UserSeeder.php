<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $carbon = new Carbon;

        User::create([
            'name' => 'Luis Gomez' , 
            'email' => 'probando@gmail.com', 
            'password' => Hash::make('12345678'),
            'email_verified_at' => $carbon->format('Y-m-d H:i:s'),

        ]);

        User::create([
            'name' => 'Luis Gomez' , 
            'email' => 'probando2@gmail.com', 
            'password' => Hash::make('12345678'),
            'email_verified_at' => $carbon->format('Y-m-d H:i:s'),

        ]);
    }
}
