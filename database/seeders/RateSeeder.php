<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateSeeder extends Seeder
{
    public function run(): void
    {
        Rate::factory()
        ->count(25)
        ->create();
    }
}