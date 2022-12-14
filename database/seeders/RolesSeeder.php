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
                'name' => 'Category_view',
                'group_name' => 'Category',
            ],
            [
                'name' => 'Category_create',
                'group_name' => 'Category',
            ],
            [
                'name' => 'Category_update',
                'group_name' => 'Category',
            ],
            [
                'name' => 'Category_delete',
                'group_name' => 'Category',
            ],
            [
                'name' => 'Category_restore',
                'group_name' => 'Category',
            ],
            [
                'name' => 'Category_forceDelete',
                'group_name' => 'Category',
            ],
            [
                'name' => 'Category_viewtrash',
                'group_name' => 'Category',
            ],
            [
                'name' => 'User_viewAny',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_view',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_create',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_update',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_delete',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_restore',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_forceDelete',
                'group_name' => 'User',
            ],
            [
                'name' => 'User_viewtrash',
                'group_name' => 'User',
            ],
            [
                'name' => 'Product_viewAny',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_view',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_create',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_update',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_delete',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_restore',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_forceDelete',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Product_viewtrash',
                'group_name' => 'Product',
            ],
            [
                'name' => 'Group_viewAny',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_view',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_create',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_update',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_delete',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_restore',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_forceDelete',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Group_viewtrash',
                'group_name' => 'Group',
            ],
            [
                'name' => 'Customer_viewAny',
                'group_name' => 'Customer',
            ],
            [
                'name' => 'Customer_view',
                'group_name' => 'Customer',
            ],
            [
                'name' => 'Order_viewAny',
                'group_name' => 'Order',
            ],
            [
                'name' => 'Order_view',
                'group_name' => 'Order',
            ],

        ]);
    }
}
