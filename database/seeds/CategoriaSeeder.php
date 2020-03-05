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
        DB::table('categorias')->insert([
            'nombre' => 'A',
            'precio_dia' => 10,
            'created_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'B',
            'precio_dia' => 15,
            'created_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'C',
            'precio_dia' => 20,
            'created_at' => Carbon::now(),
        ]);
    }
}
