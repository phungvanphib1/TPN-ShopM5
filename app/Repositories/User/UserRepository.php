<?php

namespace App\Repositories\User;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    function getModel()
    {
        return User::class;
    }
    public function all($request)
    {
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $id                     = $request->id ?? '';
        $email                  = $request->email  ?? '';
        // thực hiện query
        $query = User::select('*');
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
            $query->orWhere('email', 'LIKE', '%' . $key . '%');
        }
        if (!empty($request->search)) {
            $search = $request->search;
            $query = $query->Search($search);
        }
        $query->Phoneuser(request(['phoneuser']));
        $query->Nameuser(request(['nameuser']));
        $query->Groupuser(request(['groupuser']));
        $query->Iduser(request(['iduser']));
        return $query->orderBy('id', 'DESC')->get();
    }
    public function update($request, $id)
    {
        $user = $this->model->find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->province_id = $request->province_id;
        $user->ward_id = $request->ward_id;
        $user->district_id = $request->district_id;
        $user->group_id = $request->group_id;
        if ($request['image']) {
            $file = $request['image'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time();
            $newFileName = $fileName . '.' . $fileExtension;
            $path = 'storage/' . $request['image']->store('images', 'public');
            $user->image = $path;
        }
        $user->save();
        return true;
    }
    public function create($data)
    {
        $user = $this->model;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);
        $user->address = $data->address;
        $user->phone = $data->phone;
        $user->image = $data->image;
        $user->gender = $data->gender;
        $user->birthday = $data->birthday;
        $user->province_id = $data->province_id;
        $user->district_id = $data->district_id;
        $user->ward_id = $data->ward_id;
        $user->group_id = $data->group_id;
        if ($data['image']) {
            $file = $data['image'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time();
            $newFileName = $fileName . '.' . $fileExtension;
            $path = 'storage/' . $data['image']->store('images', 'public');
            $user->image = $path;
        }
        try {
            $user->save();
            $data = [
                'name' => $user->name,
                'pass' => $data->password,
            ];
            Mail::send('mail.mailUser', compact('data'), function ($email) use ($user) {
                $email->subject('TPN Shop');
                $email->to($user->email, $user->name);
            });

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
    public function softDeletes($id)
    {
        $user = $this->model->findOrFail($id);
        $user->deleted_at = date("Y-m-d h:i:s");
        try {
            $user->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
    public function delete($id)
    {
        $category = $this->model->findOrFail($id);
        try {
            $category->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $category;
    }
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $users = $this->model->withTrashed()->findOrFail($id);
        // $this->authorize('restore', User::class);
        $users->deleted_at = null;
        try {
            $users->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
    public function trash($request)
    {
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $id                     = $request->id ?? '';
        $email                  = $request->email  ?? '';

        // thực hiện query
        $query = User::withTrashed();

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%')->where('deleted_at', '!=', null);
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('name', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('email', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }

        //Phân trang
        $users = $query->orderBy('id', 'DESC')->where('deleted_at', '!=', null)->paginate(5);
        $params = [
            'f_id'           => $id,
            'f_name'         => $name,
            'f_key'          => $key,
            'f_email'        => $email,
            'users'          => $users
        ];
        return view('backend.users.trash', $params);
    }
    public function deletes($id)
    {
        try {
            $users = User::withTrashed()->findOrFail($id);
            $image = str_replace('storage', 'public', $users->avatar);
            Storage::delete($image);
            $users->forceDelete();
            Session::flash('success', 'Xóa thành công');
            return redirect()->route('users.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Xóa thất bại');
            return redirect()->route('users.trash');
        }
    }
    public function loginProcessing($data)
    {
        //    dd($data);
        if (Auth::attempt($data)) {
            return redirect()->route('users.index');
        } else {
            $kq = 'tài khoản, hoặc mật khẩu không đúng';
            return redirect()->route('login')->with($kq);
        }
    }
    public function logout()
    {
    }

    public function provinces()
    {
        return Province::orderBy('id', 'DESC')->get();
    }
    public function districts()
    {
        return District::orderBy('id', 'DESC')->get();
    }
    public function wards()
    {
        return Ward::orderBy('id', 'DESC')->get();
    }
}
