<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Flasher\Prime\FlasherInterface;
use App\Models\User;
use App\Models\Gender;

use App\Models\Profession;


class ProfileController extends Controller
{
    public function profile(){
        $data['genders'] = Gender::latest()->get();

        $data['professions'] = Profession::latest()->get();
        $data['user'] = User::findOrFail(auth()->user()->id);

        return view('backend.profile',$data);
    }

    public function update(ProfileRequest $request,  FlasherInterface $flasher){
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
        $insert->profession_id = $request->profession_id;
        $insert->address = $request->address;
        $insert->description = $request->description;


        $insert->update();

        session()->flash('flash_message', [
            'message' => 'Profile Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('dashboard');
    }

}
