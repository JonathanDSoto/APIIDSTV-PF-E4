<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'id_client' => Client::all()->random()->id,
                'name' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('#Admin123'),
                'roll' => 1,
            ]);
        }

        User::factory()
            ->count(24)
            ->create();
    }
}