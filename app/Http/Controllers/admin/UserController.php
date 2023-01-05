<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\TakePasswordRequest;
use App\Http\Requests\User\UpdatePasswordByMailRequets;
use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\District;
use App\Models\Group;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use App\Services\Group\GroupServiceInterface;
use App\Services\User\UserServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userService;
    private $GroupService;
    public function __construct(UserServiceInterface $UserService, GroupServiceInterface $GroupService)
    {
        $this->GroupService = $GroupService;
        $this->userService = $UserService;
    }
    public function index(Request $request)
    {
        $groups = Group::get();
        $this->authorize('viewAny', User::class);
        $users = $this->userService->all($request);
        return view('admin.user.index', compact('users', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', User::class);
        $groups = $this->GroupService->all($request);
        $users = $this->userService->all($request);
        $provinces = $this->userService->provinces();
        return view('admin.user.add', compact('groups', 'users', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $this->userService->create($request);
            $notification = [
                'message' => 'Thêm nhân viên thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('users.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('users.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = $this->userService->find($id);
        return view('admin.user.profile', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', User::class);
        $users = $this->userService->find($id);
        $groups = $this->GroupService->all($id);
        $provinces = $this->userService->provinces();
        $districts = $this->userService->districts();
        $wards = $this->userService->wards();
        $this->authorize('update', $users);
        return view('admin.user.edit', compact('groups', 'users', 'provinces', 'districts', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest  $request, $id)
    {
        try {
            $this->userService->update($request, $id);
            $notification = [
                'message' => 'Cập nhật thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('users.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.update.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('users.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        try {
            DB::beginTransaction();
            $user = $this->userService->find($id);
            $user->delete();
            DB::commit();
            $notification = [
                'message' => 'Nhân viên đã bị xóa!',
                'alert-type' => 'success'
            ];
            return redirect()->route('users.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.forceDelete.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('users.index')->with($notification);
        }
    }

    public function GetDistricts(Request $request)
    {
        $province_id = $request->province_id;
        $allDistricts = District::where('province_id', $province_id)->get();
        return response()->json($allDistricts);
    }
    public function getWards(Request $request)
    {
        $district_id = $request->district_id;
        $allWards = Ward::where('district_id', $district_id)->get();
        return response()->json($allWards);
    }
    public function change_password(UpdateUserPasswordRequest  $request)
    {
        if ($request->renewpassword == $request->newpassword) {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item = User::find(Auth()->user()->id);
                $item->password = bcrypt($request->newpassword);
                $item->save();
                Session::flash('success', config('define.update.succes'));
                $notification = [
                    'message' => 'Đổi mật khẩu thành công!',
                    'alert-type' => 'success'
                ];
                return back()->with($notification);
            } else {
                Session::flash('error', config('define.update.error'));
                $notification = [
                    'saipass' => '!',
                ];
                return back()->with($notification);
            }
        } else {
            Session::flash('error', config('define.update.error'));
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }
    }
    public function adminUpdatePass(Request $request, $id)
    {
        $this->authorize('adminupdatepass', User::class);
        $user = User::find($id);
        // dd(1123);
        if( empty($request->renewpassword) || empty($request->newpassword)){
            $notification = [
                'chuanhap' => '!',
            ];
            return back()->with($notification);
        }


        if ($request->renewpassword == $request->newpassword) {

            $item = User::find($id);
            $item->password = bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => 'Đổi mật khẩu thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('users.index')->with($notification);
        } else {
            // dd($request);
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }
    }
    public function takePassword(TakePasswordRequest $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();
        if(!$user){
            $notification = [
                'saiemail' => '!',
            ];
            return redirect()->route('takepassword')->with($notification);
        }
        if ($user->email == $request->email) {
            try {
                $password = Str::random(6);
                $item = User::find($user->id);
                $item->password = bcrypt($password);
                $item->save();
                $params = [
                    'name' => $user->name,
                    'password' => $password,
                ];
                Mail::send('mail.mailuserPass', compact('params'), function ($email) use ($user) {
                    $email->subject('TPNShope');
                    $email->to($user->email, $user->name);
                });
                $notification = [
                    'okmail' => '!',
                ];
                return redirect()->route('login')->with($notification);
            } catch (\Exception $e) {
                Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            }
        }
    }
}
