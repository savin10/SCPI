<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Moto;

class MotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //\App\Models\Moto::factory(10)->create();
        DB::table('motos')->insert([
            'numplaque' => '12CD3',
            'type' => 'Haojue',
            'puissance' => '1 CV',
            'poidvide' => '1 kg',
            'nomproprietaire' => 'Borgia ADJAGBA',
        ]);

    }
}
