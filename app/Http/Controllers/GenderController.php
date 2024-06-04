<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gender;


class GenderController extends Controller
{

    public function index(){
        $genders = Gender::all();
        return view('backend.gender.gender_list', ['genders' => $genders]);
    }

    public function create()
    {
        return view('backend.gender.gender_create');
    }
    public function store(Request $request){
        $insert = new Gender;

        $insert->name = $request->name;
        $insert->save();
        return redirect()->route('gender.index');
    }
    public function edit(){
        $gender = Gender::all();
        return view('backend.gender.gender_edit');
    }
    


    public function update(Request $request, $ids){
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $gender = Gender::findOrFail($id);
            $gender->name = $request->input('name');
            $gender->save();
        }

        return redirect()->route('gender.index');
    }




    public function delete(Gender $gender, $ids){
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $gender = Gender::findOrFail($id);
            $gender->delete();
        }

        return redirect()->route('gender.index');
    }


}
