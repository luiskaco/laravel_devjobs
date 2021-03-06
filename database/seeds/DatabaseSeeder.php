<?php



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(CategoriaSeeder::class);
         $this->call(ExperienciaSeeder::class);
         $this->call(UbicacionSeeder::class);
         $this->call(SalarioSeeder::class);
      
    }
}
