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

        DB::table('citta')->insert([
            'nome' => 'Londra',
            'stato' => 'Inghilterra'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Madrid',
            'stato' => 'Spagna'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Parigi',
            'stato' => 'Francia'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Seoul',
            'stato' => 'Corea del Sud '
        ]);

        DB::table('citta')->insert([
            'nome' => 'Berlino',
            'stato' => 'Germania'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Istanbul',
            'stato' => 'Turchia'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Toronto',
            'stato' => 'Canada'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Belgrado',
            'stato' => 'Serbia'
        ]);

        DB::table('citta')->insert([
            'nome' => 'Atlanta',
            'stato' => 'Georgia'
        ]);
    }
}
