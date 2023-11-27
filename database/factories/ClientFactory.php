<?php
namespace Database\Factories;

use App\Models\Client;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'id_rates' => Rate::all()->random()->id,
        ];
    }
}
