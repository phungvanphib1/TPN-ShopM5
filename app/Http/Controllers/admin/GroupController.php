<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Role;
use App\Services\Group\GroupServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    private $groupService;
    public function __construct(GroupServiceInterface $GroupService)
    {
        $this->groupService = $GroupService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Group::class);
        $groups = $this->groupService->all($request);
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Group::class);
        return view('admin.groups.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        try {
            $this->groupService->create($request);
            $notification = [
                'message' => 'Thêm nhóm quyền thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.index')->with($notification);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Group::class);
        $group = $this->groupService->find($id);
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        try {
            $this->groupService->update($id, $request);
            $notification = [
                'message' => 'Cập nhật thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.update.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.index')->with($notification);
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
        $this->authorize('delete', Group::class);
        try {
            $group = $this->groupService->delete($id);
            $notification = [
                'message' => 'Đã chuyển vào thùng rác!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.destroy.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.index')->with($notification);
        }
    }
    public function trash()
    {
        $groups = $this->groupService->getTrash();
        return view('admin.groups.trash', compact('groups'));
    }
    public function forcedelete($id)
    {
        $this->authorize('forceDelete', Group::class);
        try {
            $this->groupService->forceDelete($id);
            $notification = [
                'message' => 'Nhóm quyền đã bị xóa!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.trash')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.forceDelete.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.trash')->with($notification);
        }
    }

    public function restore($id)
    {
        try {
            $this->authorize('restore', Group::class);
            $this->groupService->restore($id);
            $notification = [
                'message' => 'Khôi phục thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('group.trash')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.restore.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lỗi xảy ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('group.trash')->with($notification);
        }
    }
    public function detail($id)
    {

        $group =  $this->groupService->detail($id);
        return view('admin.groups.detail', $group);
    }
    public function group_detail(Request $request, $id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $this->groupService->group_detail($id, $request);
        return redirect()->route('group.index')->with($notification);
    }
}
