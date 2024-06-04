<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request){

        $request->validate([
            'name'=> 'required|string',
        ]);

        $insert = new Gender;

        $insert->name = $request->name;
        $insert->save();

        return redirect()->route('gender.index');
    }

    public function edit($id){
        $data ['gender'] = Gender::findOrFail($id);
        return view('backend.gender.gender_edit',$data);
    }



    public function update(Request $request, $id){

        $request->validate([
            'name'=> 'required|string',
        ]);

        $gender = Gender::findOrFail($id);

        $gender->name = $request->name;
        $gender->update();

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
