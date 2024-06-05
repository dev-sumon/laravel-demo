<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

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
}
