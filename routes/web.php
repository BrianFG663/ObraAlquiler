<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MaintenancesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Mail\MantenimientoMaquina;
use App\Models\Machine;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect()->route('login');});

Route::get('/dashboard', function () {
    return redirect()->route('maquinas');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//maquinas

Route::middleware('auth')->group(function () {
    
    Route::get('/maquinas', [MachineController::class, 'maquinas'])->name('maquinas');
    Route::get('/pdf/maquina/{id}', [MachineController::class, 'generarReportePDF'])->name('maquina.pdf');
    Route::match(['get', 'post'],'/maquinas/categoria', [MachineController::class, 'maquinaCategoria'])->name('maquinas.categoria');
    Route::get('/verMaquina/{id}', [MachineController::class, 'verMaquina'])->name('ver.maquinas');
    Route::delete('/eliminarMaquina', [MachineController::class, 'eliminarMaquina'])->name('eliminar.maquinas');
    Route::get('/formularioMaquina', [MachineController::class, 'formularioAgregarMaquina'])->name('formulario.maquinas');
    Route::post('/agregarMaquina', [MachineController::class, 'agregarMaquina'])->name('agregar.maquinas');
    Route::get('/formulario/{id}', [MachineController::class, 'formularioEditarMaquina'])->name('formulario.editar');
    Route::patch('/edicion/maquina/{id}', [MachineController::class, 'editarMaquina'])->name('editar.maquina');
});

//

//obras
Route::middleware('auth')->group(function () {
    Route::get('/obras', [ProjectController::class, 'obras'])->name('obras');
    Route::get('/verObra', [ProjectController::class, 'verObra'])->name('ver.obra');
    Route::delete('/eliminarObra', [ProjectController::class, 'eliminarObra'])->name('eliminar.obra');
    Route::get('/editar/obra/{id}', [ProjectController::class, 'formularioEditarObra'])->name('editar.obra');
    Route::patch('/obra/editar/{id}', [ProjectController::class, 'editarObra'])->name('controlador.editar.obra');
    Route::get('/formularioObra', [ProjectController::class, 'formularioAgregarObra'])->name('formulario.obras');
    Route::post('/agregarObra', [ProjectController::class, 'agregarObra'])->name('agregar.obras');
});

//asignaciones

Route::middleware('auth')->group(function () {
    Route::get('/asignaciones', [AssignmentController::class, 'asignaciones'])->name('asignaciones');
    Route::get('/verasignacion', [AssignmentController::class, 'verAsignacion'])->name('ver.asignaciones');
    Route::get('/formularioAsignar/{id}/{id_maquina}', [AssignmentController::class, 'formularioFinalizar'])->name('formulario.asignacion');
    Route::patch('/finalizar/asignacion/{id}/{id_maquina}', [AssignmentController::class, 'finalizarAsignacion'])->name('finalizar.asignacion');
    Route::delete('/eliminarAsignacion', [AssignmentController::class, 'eliminarAsignacion'])->name('eliminar.asignacion');
    Route::get('/editar/asignacion/{id}', [AssignmentController::class, 'formularioEditarAsignacion'])->name('editar.asignacion');
    Route::patch('/asignacion/editar/{id}', [AssignmentController::class, 'editarAsignacion'])->name('controlador.editar.asignacion');
});


//mantenimientos

Route::middleware('auth')->group(function () {
    Route::get('/mantenimientos', [MaintenancesController::class, 'mantenimientos'])->name('mantenimientos');
    Route::match(['get', 'post'],'/mantenimiento/maquina', [MaintenancesController::class, 'maquinaMantenimiento'])->name('maquinas.mantenimiento');
    Route::get('/verMantenimiento', [MaintenancesController::class, 'verMantenimiento'])->name('ver.mantenimiento');
    Route::get('/mantenimientos/maquina', [MaintenancesController::class, 'maquinaSinMantenimiento'])->name('maquinas.mantenimientos');
    Route::delete('/eliminarMantenimiento', [MaintenancesController::class, 'eliminarMantenimiento'])->name('eliminar.mantenimiento');
    Route::get('/editar/mantenimiento/{id}', [MaintenancesController::class, 'formularioEditarMantenimiento'])->name('editar.mantenimiento');
    Route::get('/agregar/mantenimiento', [MaintenancesController::class, 'formularioMantenimiento'])->name('formulario.mantenimiento');
    Route::post('/mantenimiento/{id}', [MaintenancesController::class, 'realizarMantenimiento'])->name('agregar.mantenimiento');
    Route::patch('/mantenimiento/editar/{id}', [MaintenancesController::class, 'editarMantenimiento'])->name('controlador.editar.mantenimiento');
});



require __DIR__.'/auth.php';
