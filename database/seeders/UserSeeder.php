<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(30)
            ->create();

        User::factory()
            ->count(100)
            ->hasPosts(20)
            ->create();

        User::factory()
            ->count(70)
            ->hasPosts(25)
            ->create();
    }
}
