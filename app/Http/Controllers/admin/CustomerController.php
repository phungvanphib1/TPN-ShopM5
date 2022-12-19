<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Customer::class);
        $customers = $this->customerService->all($request);
        return view('admin.customer.index', compact('customers'));
    }
}
