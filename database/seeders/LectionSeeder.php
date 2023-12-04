<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LectionSeeder extends Seeder
{
    public function run(): void
    {
        Lection::factory()
        ->count(75)
        ->create();
    }
}
