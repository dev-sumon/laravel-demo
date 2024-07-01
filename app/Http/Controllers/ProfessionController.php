<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionRequest;
use App\Models\Profession;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ProfessionController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:profession-list', ['only' => ['index']]);
         $this->middleware('permission:profession-create', ['only' => ['create','store']]);
         $this->middleware('permission:profession-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:profession-delete', ['only' => ['delete']]);
    }


    public function index(){
        $data['professions'] = Profession::all();
        return view('backend.profession.index', $data);
    }

    public function create(){
        return view('backend.profession.create');
    }

    public function store(ProfessionRequest $request){

        $insert = new Profession();
        $insert->name = $request->name;
        $insert->save();

        session()->flash('flash_message', [
            'message' => 'Profession Created Successfully.',
            'level' => 'success'
        ]);
        return redirect()->route('profession.index');
    }
    public function edit($id){
        $data ['profession'] = Profession::findOrFail($id);
        return view('backend.profession.edit',$data);
    }

    public function update(ProfessionRequest $request, $id){


        $profession = Profession::findOrFail($id);

        $profession->name = $request->name;
        $profession->update();


        session()->flash('flash_message', [
            'message' => 'Profession Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('profession.index');
    }

    public function delete(Profession $profession, $ids){
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $profession = Profession::findOrFail($id);
            $profession->delete();
        }


        session()->flash('flash_message', [
            'message' => 'Profession Delete Successfully.',
            'level' => 'danger'
        ]);
        return redirect()->route('profession.index');
    }
}
