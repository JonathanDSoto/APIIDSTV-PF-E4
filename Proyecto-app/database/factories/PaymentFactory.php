<?php
namespace Database\Factories;

use App\Models\Payment;
use App\Models\Client;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'id_rates' => Rate::all()->random()->id,
            'id_clients' => Client::all()->random()->id,
        ];
    }
}