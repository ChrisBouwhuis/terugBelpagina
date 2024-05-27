<?php

namespace Database\Seeders;

use App\Models\CallbackOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallbackOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CallbackOrder::factory(10)->create();
    }
}
