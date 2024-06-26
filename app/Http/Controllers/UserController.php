<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $data['users'] = User::all();
        return view('backend.user.index', $data);
    }

    public function create(){
        return view('backend.user.create');
    }


    public function store(UserRequest $request){
        $insert = new User();

        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->password = $request->password;
        $insert->save();


        session()->flash('flash_message', [
            'message' => 'User Created Successfully.',
            'level' => 'success'
        ]);

        return redirect()->route('user.index');

    }

    public function edit($id){
        $data['user'] = User::findOrFail($id);
        return view('backend.user.edit', $data);
    }

    public function update(UserRequest $request, $id){

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = $request->password;
        }


        $user->update();


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
