<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Like::class,50)->create();
        Like::factory()->count(1)->create();
        //CREA FUNZIONE PER VINCOLO UNIQUE
    }
}
