<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenancesController
{
    public function mantenimientos(){

        $mantenimientos = Maintenance::with('machine')->paginate(10);
        $maquinas_mantenimiento = Machine::has('maintenances')->get();
       
        return view('/mantenimientos/mantenimientos', compact('mantenimientos','maquinas_mantenimiento'));
    }

    public function maquinaSinMantenimiento(){
        $maquinas = Machine::with('maintenances')->get();
        $maquinas_sin_mantenimiento = [];

        foreach ($maquinas as $maquina) {

            if ($maquina->maintenances->isNotEmpty()) {

                $km_sin_mantenimiento = $maquina->life_time_km - $maquina->maintenances->last()->kilometers_maintenances;

                if($km_sin_mantenimiento >= $maquina->maintenance_km){
                    $maquinas_sin_mantenimiento[] = $maquina;
                }
            }else {
                if($maquina->life_time_km > $maquina->maintenance_km){
                    $maquinas_sin_mantenimiento[] = $maquina;
                }
            }
        }

        return view('/mantenimientos/mantenimientoMaquinas', compact('maquinas_sin_mantenimiento'));
    }

    public function maquinaMantenimiento(Request $request){

        $id = $request->input('maquina');
        $maquina = Machine::with('maintenances')->find($id);

        return view('/mantenimientos/mantenimientoCategoria', compact('maquina'));
    }


    public function eliminarMantenimiento(Request $request){
        $id = $request->input('id');
        $mantenimiento = Maintenance::find($id);
        $mantenimiento->delete();

        return response()->json(['action' => true]);
    }

    public function formularioEditarMantenimiento($id){

        $mantenimiento = Maintenance::find($id);
        $maquinas = Machine::all();
        

        return view('/mantenimientos/editarMantenimiento',compact('maquinas','mantenimiento'));
    }

    public function editarMantenimiento(Request $request,$mantenimiento_id){

        $maquina_id = $request->input('maquina');
        $maquina = Machine::find($maquina_id);

        $mantenimiento = Maintenance::find($mantenimiento_id);
        

        $mantenimiento->machine_id = $maquina->id;
        $mantenimiento->maintenance_date = $request->input('date');
        $mantenimiento->kilometers_maintenances = $maquina->life_time_km;
        $mantenimiento->description = $request->input('descripcion');
        $mantenimiento->save();

        return redirect()->route('mantenimientos');
    }

    public function verMantenimiento(Request $request){

        $mantenimiento_id = $request->input('id');

        $mantenimiento = Maintenance::with('machine.machineType')->find($mantenimiento_id);

        return view('/mantenimientos/verMantenimiento',compact('mantenimiento'));
    }

    public function formularioMantenimiento(Request $request){

        $maquina= Machine::find($request->input('id'));

        return view('/mantenimientos/agregarMantenimiento',compact('maquina'));
    }

    public function realizarMantenimiento(Request $request,$id){

        $maquina_id = $id;
        $maquina = Machine::find($maquina_id);
        $fecha = Carbon::today();

        Maintenance::create([
            'machine_id'=> $maquina->id,
            'maintenance_date'=>$fecha,
            'kilometers_maintenances'=>$maquina->life_time_km,
            'description'=>$request->input('descripcion'),
        ]);

        return redirect()->route('mantenimientos');
    }
}
