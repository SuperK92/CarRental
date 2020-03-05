<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combustibles')->insert([
            'nombre' => 'Gasolina',
            'created_at' => Carbon::now(),
        ]);

        DB::table('combustibles')->insert([
            'nombre' => 'Diesel',
            'created_at' => Carbon::now(),
        ]);
    }
}
