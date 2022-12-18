<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Services\Group\GroupServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;

class DashboarController extends Controller
{

    public function index()
    {

        $users = User::get();
        $totalCustomer  =  Customer::pluck('id')->count();
        $totalUser  =  User::pluck('id')->count();
        $params = [
            'users' => $users,
            'totalUser'=> $totalUser,
            'totalCustomer' => $totalCustomer
        ];
        return view('admin.dashboar', $params);
    }
}
