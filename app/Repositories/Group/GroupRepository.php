<?php

namespace App\Repositories\Group;

use App\Models\Group;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

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
    public function create($request ){
        $group=new Group();
        $group->name=$request->name;
        return $group->save();
    }
    public function softDeletes($id){

    }
    public function restore($id)
    {
        $group = $this->model->withTrashed()->findOrFail($id);
        $group->restore();
        return $group;
    }
    public function trash($request){

    }
    public function deletes($id) {

    }
    public function getTrash() {
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


}
