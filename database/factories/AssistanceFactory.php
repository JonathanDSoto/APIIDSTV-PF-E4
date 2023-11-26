<?php
namespace Database\Factories;

use App\Models\Assistance;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssistanceFactory extends Factory
{
    protected $model = Assistance::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'id_clients' => Client::all()->random()->id,
        ];
    }
}