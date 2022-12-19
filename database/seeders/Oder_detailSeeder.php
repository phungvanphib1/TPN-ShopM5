<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Oder_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detail')->insert([
            [
                'id' =>1,
                'product_id' => 1,
                'order_id' => 1,
                'quantity' => 2,
                'price' => 450000,
            ],
            [
                'id' =>2,
                'product_id' => 2,
                'order_id' => 2,
                'quantity' => 3,
                'price' => 500000,
            ],
        ]);
    }
}
