<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShiftRequest;
use App\Models\Shift;

class ShiftController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:shift-list', ['only' => ['index']]);
         $this->middleware('permission:shift-create', ['only' => ['create','store']]);
         $this->middleware('permission:shift-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shift-delete', ['only' => ['delete']]);
    }


    public function index(){
        $data['shifts'] = Shift::all();
        return view('backend.shift.index', $data);
    }
    public function create(){
        return view('backend.shift.create');
    }
    public function store(ShiftRequest $request){

        $insert = new Shift;
        $insert->name = $request->name;
        $insert->start_time = $request->start_time;
        $insert->end_time = $request->end_time;
        $insert->save();

        return redirect()->route('shift.index');
    }

    public function edit($id){
        $data['shifts'] = Shift::findOrFail($id);
        return view('backend.shift.edit', $data);
    }

    public function update(ShiftRequest $request, $id){

        $shifts = Shift::findOrFail($id);

        $shifts->name = $request->name;
        $shifts->start_time = $request->start_time;
        $shifts->end_time = $request->end_time;
        $shifts->update();

        return redirect()->route('shift.index');
    }

    public function delete($id){
        $shifts = Shift::findOrFail($id);
        $shifts->delete();

        return redirect()->route('shift.index');

    }
}
