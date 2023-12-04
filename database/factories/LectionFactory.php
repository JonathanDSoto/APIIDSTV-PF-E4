<?php
namespace Database\Factories;

use App\Models\Lection;
use Illuminate\Database\Eloquent\Factories\Factory;

class LectionFactory extends Factory
{
    protected $model = Lection::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'instructor_id' => $this->faker->randomDigitNotNull,
            'date' => $this->faker->date,
            'schedule' => $this->faker->time,
        ];
    }
}