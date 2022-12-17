<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'nguyen van a',
                'price' => 50000,
                'quantity' => 100,
                'description' => 'áo hoodie',
                'category_id' => 1,
                'view_count' => 1,
                'image' => 'https://cdn.shopify.com/s/files/1/0354/5169/9333/products/Ao-hoodie-1-Black-12-ZiZoou-Store.jpg?v=1670341647',
                'created_at' => '2022-12-17 04:02:10',
            ],
            [
                'id' => 2,
                'name' => 'nguyen van b',
                'price' => 80000,
                'quantity' => 200,
                'description' => 'áo sweater',
                'category_id' => 2,
                'view_count' => 3,
                'image' => 'https://cdn.shopify.com/s/files/1/0354/5169/9333/products/Ao-sweatshirt-2-DarkGrey-2-1-ZiZoou-Store_1024x.jpg?v=1640864120',
                'created_at' => '2022-12-17 04:02:10',
            ],

        ]);
    }
}
