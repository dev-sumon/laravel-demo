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
        $data['shift_groups'] = Shift::orderBy('name')->get()->groupBy('name');

        return view('backend.shift.create', $data);
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



        $data['shift'] = Shift::findOrFail($id);
        return view('backend.shift.edit', $data);
    }

    public function update(ShiftRequest $request, $id){



        $shift = Shift::findOrFail($id);

        $shift->name = $request->name;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->update();

        return redirect()->route('shift.index');
    }

    public function delete($id){
        $shifts = Shift::findOrFail($id);
        $shifts->delete();

        return redirect()->route('shift.index');

    }
}
