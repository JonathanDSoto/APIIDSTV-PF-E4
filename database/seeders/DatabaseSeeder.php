<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RateSeeder::class,
            ClientSeeder::class,
            PaymentSeeder::class,
            AssistanceSeeder::class,
            UserSeeder::class,
        ]);
    }
}