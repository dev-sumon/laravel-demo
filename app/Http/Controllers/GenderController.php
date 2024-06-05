<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Models\Gender;


class GenderController extends Controller
{

    public function index(){
        $data['genders'] = Gender::all();
        return view('backend.gender.gender_list',$data);
    }

    public function create()
    {
        return view('backend.gender.gender_create');
    }
    public function store(Request $request, FlasherInterface $flasher){

        $request->validate([
            'name'=> 'required|string',
        ]);

        $insert = new Gender;

        $insert->name = $request->name;
        $insert->save();
        session()->flash('flash_message', [
            'message' => 'Gender Create Successfully.',
            'level' => 'success'
        ]);
        return redirect()->route('gender.index');
    }

    public function edit($id){
        $data ['gender'] = Gender::findOrFail($id);
        return view('backend.gender.gender_edit',$data);
    }



    public function update(Request $request, $id, FlasherInterface $flasher){

        $request->validate([
            'name'=> 'required|string',
        ]);

        $gender = Gender::findOrFail($id);

        $gender->name = $request->name;
        $gender->update();


        session()->flash('flash_message', [
            'message' => 'Gender Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('gender.index');
    }




    public function delete(Gender $gender, $ids, FlasherInterface $flasher){
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $gender = Gender::findOrFail($id);
            $gender->delete();
        }


        session()->flash('flash_message', [
            'message' => 'Gender Delete Successfully.',
            'level' => 'danger'
        ]);
        return redirect()->route('gender.index');
    }


}
