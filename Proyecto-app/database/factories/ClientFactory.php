<?php
namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'roll' => User::all()->random()->id,
            'rates_id' => Rate::all()->random()->id,
        ];
    }
}
