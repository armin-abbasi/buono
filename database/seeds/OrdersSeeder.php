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
        foreach (range(1, 5) as $item) {
            factory(\App\Models\Order::class)->create();
            factory(\App\Models\Food::class)->create();
            factory(\App\Models\Restaurant::class)->create();
        }
    }
}
