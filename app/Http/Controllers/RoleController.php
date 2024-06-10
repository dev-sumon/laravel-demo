<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index(){
        $data['roles'] = Role::all();
        return view('backend.role.index', $data);
    }
    public function create(){
        return view('backend.role.create');
    }
    public function store(RoleRequest $request){

        $insert = new Role;

        $insert->name = $request->name;
        $insert->save();
        session()->flash('flash_message', [
            'message' => 'Role Created Successfully.',
            'level' => 'success'
        ]);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $data ['role'] = Role::findOrFail($id);
        return view('backend.role.edit',$data);
    }
    public function update(RoleRequest $request, $id){

        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->update();


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
