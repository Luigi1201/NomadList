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
        //Like::factory()->count(30)->create();    //METODO1 ERROR

        /*METODO 2 CON ERROR
        $ls=Like::factory()->count(20)->create();
        foreach ($ls as $l) {
            repeat:
            try {
                $l->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $l = Like::factory()->create();;
                goto repeat;
            }
        }
        */
    }
}
