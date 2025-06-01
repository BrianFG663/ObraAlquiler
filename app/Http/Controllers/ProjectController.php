<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Province;

class ProjectController{
    

    public function obras(){
        $obras = Project::with('province','assignmets')->paginate(10);

        return view('/obras/obras',compact('obras'));
    }

    public function verObra(Request $request){

        $id = $request->input('id');
        $obra = Project::with('province','assignmets')->find($id);

        return view('/obras/verObra',compact('obra'));
    }

    public function eliminarObra(Request $request){
        $id = $request->input('id');
        $obra = Project::find($id);
        $obra->delete();

        return response()->json(['action' => true]);
    }

    public function formularioEditarObra($id){

        $obra = Project::find($id);
        $provincias = Province::all();
        
        return view('/obras/editarObra',compact('obra','provincias'));
    }

    public function editarObra(Request $request,$id){

        $obra = Project::find($id);

        $obra->name = $request->input('name');
        $obra->start_date = $request->input('start_date');
        $obra->province_id = $request->input('provincia');
        if($request->input('end_date')){
            $obra->end_date = $request->input('end_date');
        }else{
            $obra->end_date = null;
        }
        $obra->save();

        return redirect()->route('obras');
    }

    
    public function formularioAgregarObra(){
        $provincias = Province::all();

        return view('/obras/agregarObra',compact('provincias'));
    }

    public function agregarObra(Request $request){

        $name = $request->input('name');
        $provincia = $request->input('provincia');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if(empty($end_date)){
            $end_date = null;
        }else{
            $end_date = $request->input('end_date');
        }

        Project::create([
            'name'=>$name,
            'province_id'=>$provincia,
            'end_date'=>$end_date,
            'start_date'=>$start_date
        ]);

        return redirect()->route('obras');
    }
}
