<?php

namespace App\Http\Controllers;

use App\Events\MantenimientoRequerido;
use App\Events\MaquinaNecesitaMantenimiento;
use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Project;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController
{

    public function asignaciones()
    {

        $provincia = Province::all();

        $asignaciones_pendientes = Assignment::with(['machine','user','project.province'])
        ->whereNull('end_date')
        ->paginate(4, ['*'], 'pendientes_page');

        $asignaciones_finalizadas = Assignment::with(['machine','user','project.province'])
        ->whereNotNull('end_date')
        ->paginate(4, ['*'], 'finalizadas_page');



        return view('/asignaciones/asignaciones', compact('asignaciones_pendientes', 'asignaciones_finalizadas'));
    }

    public function verAsignacion(Request $request){

        $id = $request->input('id');
        $asignacion = Assignment::with(['machine','user','project.province'])->find($id);
        
        return view('/asignaciones/verAsignacion',compact('asignacion'));
    }

    public function formularioFinalizar($id, $id_maquinaria)
    {

        $id_asignacion = $id;
        $id_maquina = $id_maquinaria;

        return view('/asignaciones/finalizarAsignacion', compact('id_asignacion', 'id_maquina'));
    }


    public function finalizarAsignacion($id, $maquina_id, Request $request)
    {
        $asignacion = Assignment::find($id);
        $asignacion->end_date = $request->input('end_date');
        $asignacion->end_reason = $request->input('descripcion');
        $asignacion->save();

        $maquina = Machine::with('maintenances')->find($maquina_id);
        $maquina->life_time_km += $request->input('km');
        $maquina->save();


        
        if ($maquina->maintenances->isNotEmpty()) {
            $km_sin_mantenimiento = $maquina->life_time_km - $maquina->maintenances->last()->kilometers_maintenances;

            if($km_sin_mantenimiento > $maquina->maintenance_km){
                event(new MaquinaNecesitaMantenimiento($maquina));
            }
        } else {
            if($maquina->life_time_km > $maquina->maintenance_km){
                event(new MaquinaNecesitaMantenimiento($maquina));
            }
        }


        
        return redirect()->route('asignaciones');
    }

    public function asignarMaquina()
    {
        $maquinas = Machine::whereDoesntHave('assignments', function ($query) {
            $query->whereNull('end_date');
        })->get();

        dd($maquinas);
    }

    public function eliminarAsignacion(Request $request){
        $id = $request->input('id');
        $asignacion = Assignment::find($id);
        $asignacion->delete();

        return response()->json(['action' => true]);
    }

    public function formularioEditarAsignacion($id){

        
        $asignacion = Assignment::find($id);
        $usuarios = User::all();
        $obras = Project::whereDoesntHave('assignmets')->get();
        $maquinas = Machine::whereDoesntHave('assignments')->get();
        

        return view('/asignaciones/editarAsignacion',compact('asignacion','usuarios','obras','maquinas'));
    }

    public function editarAsignacion(Request $request,$id){

        $asignacion = Assignment::find($id);

        $asignacion->machine_id = $request->input('machine_id');
        $asignacion->project_id = $request->input('project_id');
        $asignacion->user_id = Auth::user()->id;
        $asignacion->start_date = $request->input('start_date');
        $asignacion->end_date = $request->input('end_date');
        $asignacion->save();

        return redirect()->route('asignaciones');
    }
}
