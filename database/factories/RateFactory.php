<?php
namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    protected $model = Rate::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'time' => $this->faker->numberBetween(1, 100),
        ];
    }
}