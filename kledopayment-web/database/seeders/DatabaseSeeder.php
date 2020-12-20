<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Payment::unguard();
        Payment::truncate();
        
        $this->call(PaymentTableSeeder::class);

        $this->command->info('Payment table seeded!');

        
        Payment::factory()->create();
        Payment::reguard();
    }
}

