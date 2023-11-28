<?php

namespace Database\Factories;

use App\Models\Automobile;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Automobile>
 */
class AutomobileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Automobile::class;

    public function definition(): array
    {
        return [
            "brand" => Str::random(10),
            "model" => Str::random(10),
            "color" => $this->faker->hslColor,
            "number_rf" => Str::random(7),
            "is_active"=>$this->faker->numberBetween(0, 1),
            "client_id" => $this->faker->numberBetween(0, Client::all()->count()),

        ];
    }
}
