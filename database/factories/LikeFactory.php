<?php

namespace Database\Factories;

use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* METODO 1 ERROR
        $userID=0;
        $cittaID=0;
        do {
            $userID = $this->faker->numberBetween(1,5);
            $cittaID = $this->faker->numberBetween(1,16);
        } while (DB::table('like')->where('citta_id', $cittaID)->where('user_id', $userID)->exists());
        return [
            'user_id' => $userID,
            'citta_id' => $cittaID
        ];
        */
        

        /* METODO2 ERROR
        $userID = $this->faker->numberBetween(1,5);
        $cittaID = $this->faker->numberBetween(1,16);
        return [
            'user_id' => $userID,
            'citta_id' => $cittaID
        ];
        */

        /*metodo 3
        $likes=Like::all();
        $userID = 0;
        $cittaID = 0;
        $exist = false;
        foreach($likes as $like){
            if($like['user_id']!=$userID && $like['citta_id']!=$cittaID){
                $exist=true;
            }
            if(!$exist){
                return [
                    'user_id' => $userID,
                    'citta_id' => $cittaID
                ];
            }else{
                do {
                    $userID = $this->faker->numberBetween(1,5);
                    $cittaID = $this->faker->numberBetween(1,16);
                } while (DB::table('like')->where('user_id', $userID)->where('citta_id', $cittaID)->exists());
                return [
                    'user_id' => $userID,
                    'citta_id' => $cittaID
                ];
            }
            
        }
        */

    }
}
