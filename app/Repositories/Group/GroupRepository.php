<?php

namespace App\Repositories\Group;

use App\Models\Group;
use App\Models\Role;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{

    function getModel()
    {
        return Group::class;
    }
    public function all($request)
    {
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $id                     = $request->id ?? '';
        // thực hiện query
        $query = Group::select('*');
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
        }
        //Phân trang
        $groups = $query->paginate(5);
        $params = [
            'f_id'           => $id,
            'f_name'         => $name,
            'f_key'          => $key,
            'groups'          => $groups
        ];

        return $query->paginate(5);
    }
    public function update($id, $data)
    {
        $group = Group::find($id);
        $group->name = $data->name;
        return $group->save();
    }
    public function create($request)
    {
        $group = new Group();
        $group->name = $request->name;
        return $group->save();
    }
    public function softDeletes($id)
    {
    }
    public function restore($id)
    {
        $group = $this->model->withTrashed()->findOrFail($id);
        $group->restore();
        return $group;
    }
    public function trash($request)
    {
    }
    public function deletes($id)
    {
    }
    public function getTrash()
    {
        $query = $this->model->onlyTrashed();
        $query->orderBy('id', 'desc');
        $groups = $query->paginate(5);
        return $groups;
    }
    public function forceDelete($id)
    {
        $group = $this->model->onlyTrashed()->findOrFail($id);
        $group->forceDelete();
        return $group;
    }
    public function detail($id)
    {
        $group = Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];

        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return $params;
    }
    public function group_detail($id, $request)
    {
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return true;
    }
}
