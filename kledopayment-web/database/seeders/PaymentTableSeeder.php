<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;


class PaymentTableSeeder extends Seeder 
{
    
    public function run()
    {
        \DB::table('payments')->delete();
        
        $items = [
            [
                'payment_name' => 'BNI',
            ],
            [
                'payment_name' => 'BRI',   
            ],
            [
                'payment_name' => 'MANDIRI',   
            ],
        ];

        foreach ($items as $item) {
            Payment::create([ 'payment_name' => $item['payment_name']]);
        }
    }
}
