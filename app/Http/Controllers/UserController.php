<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Gender;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list', ['only' => ['index']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
    public function index(){
        $data['users'] = User::all();
        return view('backend.user.index', $data);
    }

    public function create(){

        $data['roles'] = Role::latest()->get();
        $data['genders'] = Gender::latest()->get();
        return view('backend.user.create', $data);
    }


    public function store(UserRequest $request){
        $insert = new User();

        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->role_id = $request->role;
        $insert->password = $request->password;
        $insert->save();

        $insert->assignRole($insert->role->name);


        session()->flash('flash_message', [
            'message' => 'User Created Successfully.',
            'level' => 'success'
        ]);

        return redirect()->route('user.index');

    }

    public function edit($id){
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::latest()->get();
        $data['genders'] = Gender::latest()->get();
        return view('backend.user.edit', $data);
    }

    public function update(UserRequest $request, $id){

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->gender_id = $request->gender;
        if($request->password){
            $user->password = $request->password;
        }


        $user->update();

        $user->syncRoles($user->role->name);


        session()->flash('flash_message', [
            'message' => 'User Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('user.index');
    }


    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('flash_message', [
            'message' => 'User Deleted Successfully.',
            'level' => 'danger'
        ]);
        return redirect()->route('user.index');
    }

}
