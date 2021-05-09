<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class CittaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citta')->insert([
            'nome' => 'Roma',
            'stato' => 'Italia'
        ]);
    }
}
