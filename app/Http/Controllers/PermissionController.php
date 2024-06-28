<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    public function index(){
        $data['permissions'] = Permission::all();
        return view('backend.permission.index', $data);
    }

    public function create(){
        return view('backend.permission.create');
    }
    public function store(PermissionRequest $request){

        $insert = new Permission();
        $insert->name = $request->name;
        $insert->prefix = $request->prefix;
        $insert->save();

        session()->flash('flash_message', [
            'message' => 'Permission Created Successfully.',
            'level' => 'success'
        ]);

        return redirect()->route('permission.index');
    }
    public function edit($id){
        $data['permission'] = Permission::findOrFail($id);
        return view('backend.permission.edit', $data);
    }
    public function update(PermissionRequest $request, $id){


        $Permission = Permission::findOrFail($id);

        $Permission->name = $request->name;
        $Permission->prefix = $request->prefix;
        $Permission->update();


        session()->flash('flash_message', [
            'message' => 'Permission Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('permission.index');
    }
    public function delete($id){
        $role = Permission::findOrFail($id);
        $role->delete();

        session()->flash('flash_message', [
            'message' => 'Permission Deleted Successfully.',
            'level' => 'danger'
        ]);
        return redirect()->route('permission.index');
    }
}
