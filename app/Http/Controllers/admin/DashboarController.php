<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function index()
    {
        $totalCustomer  =  Customer::pluck('id')->count();
        $params = [
            'totalCustomer' => $totalCustomer
        ];
        return view('admin.dashboar', $params);
    }
}
