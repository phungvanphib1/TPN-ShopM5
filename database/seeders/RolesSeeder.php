<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                'name' => 'Category_viewAny',
                'group_name' => 'Category',

            ],
            [
                'name' => 'Product_viewAny',
                'group_name' => 'Product',

            ],

        ]);
    }
}
