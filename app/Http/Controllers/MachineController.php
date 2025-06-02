<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Machinetype;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MachineController
{
    public function traerMaquina($id){
        
        $maquina = Machine::with([
            'machineType',
            'maintenances',
            'assignments.project.province'
        ])->find($id);

        return $maquina;

    }
    
    public function maquinas(){

        $tipos = Machinetype::all();

        $maquinas = Machine::with('machineType', 'maintenances')->paginate(10);
        return view('/maquinas/Maquinas', compact('maquinas','tipos'));

    }

    public function formularioAgregarMaquina(){
        $tipos = Machinetype::all();

        return view('/maquinas/agregarMaquinas',compact('tipos'));
    }

    public function agregarMaquina(Request $request){

         Log::info('Datos recibidos en agregarMaquina:', $request->all());
        
        $serial = $request->input('serial');
        $model = $request->input('model');
        $maintenance_km = $request->input('maintenance_km');
        $tipo = $request->input('tipo');
        $estado = $request->input('estado');

        if($estado == null){
            $life_time_km = 0;
        }else{
            $life_time_km = $request->input('life_time_km');
        }

        Machine::create([
            'serial_number'=>'SN-'.$serial,
            'model'=>$model,
            'machinetype_id'=>$tipo,
            'maintenance_km'=>$maintenance_km,
            'life_time_km'=>$life_time_km
        ]);

        return redirect()->route('maquinas');
    }

    public function maquinaCategoria(Request $request)
    {
        $tipos = Machinetype::all();
        $id = $request->input('tipo');
        $tipo = Machinetype::find($id);
        $tipo_nombre = $tipo->name;

        $maquinas = Machine::where('machinetype_id', $id)
            ->with('machineType')
            ->paginate(10)
            ->appends(['tipo' => $id]);

        return view('/maquinas/maquinasCategoria', compact('maquinas', 'tipo_nombre','tipos'));
    }   

    public function verMaquina(Request $request,$id){

        $maquina_id = $id;
        $maquina = $this->traerMaquina($maquina_id);

        return view('/maquinas/verMaquina',compact('maquina'));
    }

    public function eliminarMaquina(Request $request){
        $id = $request->input('id');
        $maquina = Machine::find($id);
        $maquina->delete();

        return response()->json(['action' => true]);
    }

    public function formularioEditarMaquina($id){

        $maquina = Machine::find($id);
        $tipos = Machinetype::all();
        

        return view('/maquinas/editarMaquina',compact('maquina','tipos'));
    }

    public function editarMaquina(Request $request,$id){

        $maquina = Machine::find($id);

        $maquina->serial_number = $request->input('serial');
        $maquina->model = $request->input('model');
        $maquina->maintenance_km = $request->input('maintenance_km');
        $maquina->machinetype_id = $request->input('tipo');
        $maquina->save();

        return redirect()->route('maquinas');
    }

    public function generarReportePDF($id)
    {
    
        $maquina_mantenimiento = Machine::with(['maintenances','machineType','assignments'])->find($id);

        $maquina = ['maquina' => $maquina_mantenimiento];
        $pdf = Pdf::loadView('pdf.informe', $maquina);
    
        return $pdf->stream('archivo.pdf');
    }
}
