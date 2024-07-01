<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:role-list', ['only' => ['index']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['delete']]);
    }
    public function index(){
        $data['roles'] = Role::all();
        return view('backend.role.index', $data);
    }
    public function create(){
        $data['permission_groups'] = Permission::orderBy('name')->get()->groupBy('prefix');
        return view('backend.role.create', $data);
    }
    public function store(RoleRequest $request){


        $insert = new Role;

        $insert->name = $request->name;
        $insert->status = $request->status ?? 0;
        $insert->save();

        $insert->givePermissionTo($request->permissions);

        session()->flash('flash_message', [
            'message' => 'Role Created Successfully.',
            'level' => 'success'
        ]);
        return redirect()->route('role.index');
    }
    public function edit($id){

        $data ['role'] = Role::findOrFail($id);
        $data['permission_groups'] = Permission::orderBy('name')->get()->groupBy('prefix');
        return view('backend.role.edit',$data);
    }
    public function update(RoleRequest $request, $id){

        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->status = $request->status ?? 0;
        $role->update();

        $role->syncPermissions($request->permissions);

        session()->flash('flash_message', [
            'message' => 'Role Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('role.index');
    }
    public function delete($id){
        $role = Role::findOrFail($id);
        $role->delete();

        session()->flash('flash_message', [
            'message' => 'User Deleted Successfully.',
            'level' => 'danger'
        ]);
        return redirect()->route('role.index');
    }
}
