<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\Gender;


class ProfileController extends Controller
{
    public function profile(){
        $data['genders'] = Gender::latest()->get();
        $data['user'] = User::findOrFail(auth()->user()->id);

        // return view('backend.profile',compact('user'));
        return view('backend.profile',$data);
    }

    public function update(ProfileRequest $request){
        $insert = User::findOrFail(auth()->user()->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("users/", $filename, 'public');
            $insert->image = $path;
        }

        $insert->name = $request->name;
        $insert->age = $request->age;
        $insert->gender_id = $request->gender_id;
        $insert->profession = $request->profession;
        $insert->address = $request->address;
        $insert->description = $request->description;


        $insert->update();
        return redirect()->route('dashboard');
    }

}
