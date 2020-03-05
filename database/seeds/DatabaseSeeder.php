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
        // $this->call(UsersTableSeeder::class);
        // $this->call(MarcaSeeder::class);
        //$this->call(ModeloSeeder::class);
        //$this->call(TransmisionSeeder::class);
        //$this->call(CombustibleSeeder::class);
        //$this->call(CategoriaSeeder::class);
        $this->call(VehiculoSeeder::class);
    }
}
