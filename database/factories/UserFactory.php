<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'id_client' => Client::all()->random()->id,
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('#0¿4!IxU'),
            'roll' => $this->faker->numberBetween(1, 2),
        ];
    }
}