<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RateSeeder::class,
            ClientSeeder::class,
            PaymentSeeder::class,
            AssistanceSeeder::class,
        ]);
    }
}