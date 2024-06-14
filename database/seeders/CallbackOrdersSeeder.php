<?php

namespace Database\Seeders;

use App\Models\CallbackOrder;
use App\Models\User;
use Illuminate\Database\Seeder;

class CallbackOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CallbackOrder::factory(50)->create();
        User::factory(10)->create();
    }
}
