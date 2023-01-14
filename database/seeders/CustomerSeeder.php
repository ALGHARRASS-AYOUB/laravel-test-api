<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()
            ->count(30)
            ->create();

        Customer::factory()
            ->count(100)
            ->hasInvoices(20)
            ->create();

        Customer::factory()
            ->count(70)
            ->hasInvoices(25)
            ->create();
    }
}
