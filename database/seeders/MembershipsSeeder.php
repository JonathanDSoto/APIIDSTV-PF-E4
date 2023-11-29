<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Membership;

class MembershipsSeeder extends Seeder
{
    public function run(): void
    {
        Membership::factory()
        ->count(3)
        ->create();
    }
}
