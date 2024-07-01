<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GenderRequest;
use App\Models\Gender;


class GenderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:gender-list', ['only' => ['index']]);
         $this->middleware('permission:gender-create', ['only' => ['create','store']]);
         $this->middleware('permission:gender-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:gender-delete', ['only' => ['delete']]);
    }

    public function index(){
        $data['genders'] = Gender::all();
        return view('backend.gender.gender_list',$data);
    }

    public function create()
    {
        return view('backend.gender.gender_create');
    }
    public function store(GenderRequest $request){

        $insert = new Gender;

        $insert->name = $request->name;
        $insert->save();
        session()->flash('flash_message', [
            'message' => 'Gender Created Successfully.',
            'level' => 'success'
        ]);
        return redirect()->route('gender.index');
    }

    public function edit($id){
        $data ['gender'] = Gender::findOrFail($id);
        return view('backend.gender.gender_edit',$data);
    }



    public function update(GenderRequest $request, $id){

        $gender = Gender::findOrFail($id);

        $gender->name = $request->name;
        $gender->update();


        session()->flash('flash_message', [
            'message' => 'Gender Updated Successfully.',
            'level' => 'info'
        ]);
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


        session()->flash('flash_message', [
            'message' => 'Gender Delete Successfully.',
            'level' => 'danger'
        ]);
        return redirect()->route('gender.index');
    }


}
