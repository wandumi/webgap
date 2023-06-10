<?php

namespace Database\Seeders;

use App\Models\OrderItems;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory(30)->create()->each(function(Order $order){
            OrderItems::factory(random_int(1, 5))->create([
               'order_id' => $order->id
            ]);
        });
    }
}
