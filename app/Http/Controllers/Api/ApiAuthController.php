<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\Customer\CustomerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    protected $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->customerService = $customerService;
    }
    // dang nhap
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }
    // dang ki
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|string|email|max:100|unique:customers',
            'name' => 'required|string',
            'phone' => 'required',
            'password' => 'required|string|min:6',

        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'errors' => $validator->errors()->toJson(),
                'message' => 'User failled registered',
                'status' => false,
            ], 400);
        }
        $data = array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        );
        $customer = $this->customerService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'customer' => $customer
        ], 201);
    }
    // dang xuat
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
    // thong tin
    public function userProfile()
    {
        return response()->json(auth('api')->user());
    }
    // thay doi mat khau
    public function changePassWord(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }
            $user = auth('api')->user();
            if (Hash::check($request->old_password, $user->password)) {
                $user = Customer::where('id', $user->id)->update(
                    ['password' => bcrypt($request->new_password)]
                );
                return response()->json([
                    'message' => 'Đổi mật khẩu thành công',
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Mật khẩu củ không đúng',
                ], 401);
            }
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            return response()->json([
                'message' => 'Đổi mật không khẩu thành công',
            ], 401);
        }
    }
}
