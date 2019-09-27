<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Food::class)->times(20)->create();
        factory(\App\Models\Order::class)->times(20)->create()->each(function ($order) {
            $order->foods()->attach(\App\Models\Food::all()->random(1));
        });
        factory(\App\Models\Restaurant::class)->times(20)->create();
    }
}
