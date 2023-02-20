<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lang = 55.753994;
        $long = 37.622093;

        $langtitude = fake()->latitude($min = ($lang - (rand(0,1000) / 1000)), $max = ($lang + (rand(0,20) / 1000)));
        $longitute = fake()->longitude($min = ($long - (rand(0,1000) / 1000)), $max = ($long + (rand(0,20) / 1000)));
        return [
            'date'=>fake()->date(),
            'phone'=>fake()->phoneNumber(),
            'email'=>fake()->email(),
            'coords'=>$langtitude.",".$longitute,
            'sum'=>fake()->numberBetween(1, 100000),
        ];
    }
}
