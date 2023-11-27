<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assistance;

class AssistanceSeeder extends Seeder
{
    public function run(): void
    {
        Assistance::factory()
        ->count(25)
        ->create();
    }
}