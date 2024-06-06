<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ProfessionController extends Controller
{
    public function index(){
        $data['professions'] = Profession::all();
        return view('backend.profession.index', $data);
    }

    public function create(){
        return view('backend.profession.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);

        $insert = new Profession();
        $insert->name = $request->name;
        $insert->save();

        session()->flash('flash_message', [
            'message' => 'Profession Create Successfully.',
            'level' => 'success'
        ]);
        return redirect()->route('profession.index');
    }
    public function edit($id){
        $data ['profession'] = Profession::findOrFail($id);
        return view('backend.profession.edit',$data);
    }

    public function update(Request $request, $id, FlasherInterface $flasher){

        $request->validate([
            'name'=> 'required|string',
        ]);

        $profession = Profession::findOrFail($id);

        $profession->name = $request->name;
        $profession->update();


        session()->flash('flash_message', [
            'message' => 'Profession Updated Successfully.',
            'level' => 'info'
        ]);
        return redirect()->route('profession.index');
    }

    public function delete(Profession $profession, $ids, FlasherInterface $flasher){
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
