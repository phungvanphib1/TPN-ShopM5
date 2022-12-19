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
                'name' => 'Áo hoodie nam nữ unisex local brand',
                'price' => 50000,
                'quantity' => 100,
                'description' => 'áo hoodie',
                'category_id' => 2,
                'view_count' => 1,
                'image' => 'https://vn-live-01.slatic.net/p/9adcf26e27973cf67a305728abaf8176.jpg',
                'created_at' => '2022-12-17 04:02:10',
            ],
            [
                'id' => 2,
                'name' => 'Áo Sweater CUNA Áo Sweater Nam Nữ',
                'price' => 80000,
                'quantity' => 200,
                'description' => 'áo sweater',
                'category_id' => 2,
                'view_count' => 3,
                'image' => 'https://vn-test-11.slatic.net/p/911bb4ae32092d689601e453ed18e267.png',
                'created_at' => '2022-12-17 04:02:10',
            ],
            [
                'id' => 3,
                'name' => 'Quần Âu Nam TPN',
                'price' => 80000,
                'quantity' => 200,
                'description' => 'Quần Âu',
                'category_id' => 1,
                'view_count' => 3,
                'image' => 'https://product.hstatic.net/1000388805/product/quan-au-nam-mau-trang_812b008638f24512a0aa10b13f1e5dc5_large.jpg',
                'created_at' => '2022-12-17 04:02:10',
            ],
            [
                'id' => 4,
                'name' => 'Dép Nam Nữ Quai Ngang Thời Trang TPN',
                'price' => 80000,
                'quantity' => 200,
                'description' => 'Dép',
                'category_id' => 4,
                'view_count' => 3,
                'image' => 'https://prices.vn/storage/photo/product/dep-quai-ngang-nam-nu-thoi-trang_qn340m.png',
                'created_at' => '2022-12-17 04:02:10',
            ],
            [
                'id' => 5,
                'name' => 'Giày Bata _Vans Vault Old Skool',
                'price' => 80000,
                'quantity' => 200,
                'description' => 'Giày',
                'category_id' => 5,
                'view_count' => 3,
                'image' => 'https://lzd-img-global.slatic.net/g/shop/74475216062cba18ac924d1e54760423.jpeg_1200x1200q80.jpg_.webp',
                'created_at' => '2022-12-17 04:02:10',
            ],

        ]);
    }
}
