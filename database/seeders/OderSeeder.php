<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id' =>1,
                'customer_id' => 1,
                'total' => 300000,
                'date_at' => '2022-12-25',
                'date_ship' => '2022-12-27',
                'note' =>'giao hàng sau 17h00',
                'status' =>0,
            ],
            [
                'id' =>2,
                'customer_id' => 2,
                'total' => 150000,
                'date_at' => '2022-12-28',
                'date_ship' => '2022-12-30',
                'note' =>'giao hàng 24/7',
                'status' =>1,
            ],
        ]);
    }
}
