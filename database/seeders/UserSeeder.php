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
        $user->image = '1jCVdawgaYEAN8g7RCOxHH1mkA9IJcixSfQlmkNk.png';
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
        $user->image = '3WNnFrspU6tCvLuBBNRHvpoP2h3o2BZNxXqkgUll.png';
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
        $user->image = '275298848_1366445620471977_6553271644054042636_n.jpg';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->group_id = '2';
        $user->province_id  = '1';
        $user->district_id  = '2';
        $user->ward_id  = '3';
        $user->gender = 'Nam';
        $user->save();

        $user = new User();
        $user->name = 'SuperAdmin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2003/06/27';
        $user->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE_XmAIgdjzF9yR3A_s9jXmD21FfVVJYzALN3EqfXwadXVdhez3rEVk4Ljvlq1g9-dwhw&usqp=CAU';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->group_id = '1';
        $user->province_id  = '1';
        $user->district_id  = '2';
        $user->ward_id  = '3';
        $user->gender = 'Nam';
        $user->save();


    }
}
