<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehiculos')->insert([
            'matricula' => '1234ABC',
            'modelo_id' => 1,
            'transmision_id' => 1,
            'combustible_id' => 1,
            'categoria_id' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
