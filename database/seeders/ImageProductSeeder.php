<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_products')->insert([
            [
                'product_id' => '1',
                'image' => '1jCVdawgaYEAN8g7RCOxHH1mkA9IJcixSfQlmkNk.png',
            ],
            [
                'product_id' => '2',
                'image' => '1jCVdawgaYEAN8g7RCOxHH1mkA9IJcixSfQlmkNk.png',
            ],
        ]);
    }
}


