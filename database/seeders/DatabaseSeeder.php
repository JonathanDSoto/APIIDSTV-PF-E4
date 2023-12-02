<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MembershipSeeder::class,
            UserSeeder::class,
            PaymentSeeder::class,
            InstructorSeeder::class,
        ]);
    }
}