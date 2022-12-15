<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Trần Hữu Nhân';
        $user->email = 'nhan@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2004/01/01';
        $user->address = 'Quảng Trị';
        $user->image = 'cuong.jpg';
        $user->phone = '0935779035';
        $user->gender = 'Nam';
        $user->group_id = '1';
        $user->province_id  = '1';
        $user->district_id  = '1';
        $user->ward_id  = '1';
        $user->save();

        $user = new User();
        $user->name = 'Phùng Văn Phi';
        $user->email = 'phi@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2002/04/24';
        $user->address = 'Quảng Trị';
        $user->image = 'phi.jpg';
        $user->phone = '0777333274';
        $user->gender = 'Nam';
        $user->group_id = '2';
        $user->province_id  = '1';
        $user->district_id  = '2';
        $user->ward_id  = '3';
        $user->save();

        $user = new User();
        $user->name = 'Mai Xuân Thảo';
        $user->email = 'thao@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2003/06/27';
        $user->image = 'phi.jpg';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->group_id = '2';
        $user->province_id  = '1';
        $user->district_id  = '2';
        $user->ward_id  = '3';
        $user->gender = 'Nam';
        $user->save();


    }
}
