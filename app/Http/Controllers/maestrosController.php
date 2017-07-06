<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Materias;
use App\Maestros;
use DB;

class maestrosController extends Controller
{
    //

    public function registrar(){
    	$carreras = Carreras::all();
    	$materias = Materias::all();
    	return view('/registrarMaestro', compact('carreras', 'materias'));
    }

    public function guardar(Request $request){
    	$maestro = new Maestros();
    	$maestro->nombre = $request->input('nombre');
    	$maestro->carrera_id = $request->input('carrera');
    	$maestro->materia_id = $request->input('materia');
    	$maestro->save();

    	return redirect('/consultarMaestro');
    }

    public function consultar(){
    	$maestros = DB::table('maestros')
            ->join('carreras', 'maestros.carrera_id', '=', 'carreras.id')
            ->join('materias', 'maestros.materia_id', '=', 'materias.id')
            ->select('maestros.*', 'carreras.nombre AS nom_carrera', 'materias.nombre AS nom_materia')
            ->paginate(10);
    	return view('/consultarMaestro', compact('maestros'));
    }

    public function actualizar($id, Request $request){
        $maestro = Maestros::find($id);
        $maestro->nombre = $request->input('nombre');
        $maestro->carrera_id = $request->input('carrera');
        $maestro->materia_id = $request->input('materia');
        $maestro->save();

        return redirect('/consultarMaestro');
    }

    public function eliminar($id){
        $maestro = Maestros::find($id);
        $maestro->delete();
        return redirect('/consultarMaestro');
    }

    public function editar($id){
        $maestro = DB::table('maestros')
            ->where('maestros.id', '=', $id)
            ->join('carreras', 'maestros.carrera_id', '=', 'carreras.id')
            ->join('materias', 'maestros.carrera_id', '=', 'materias.id')
            ->select('maestros.*', 'carreras.nombre AS nom_carrera', 'materias.nombre AS nom_materia')
            ->first();

        $carreras = Carreras::all();
        $materias = Materias::all();
        return view('/editarMaestro', compact('maestro', 'carreras','materias'));
    }

    public function maestrospdf(){
        $maestros = DB::table('maestros')
            ->join('carreras', 'maestros.carrera_id', 'carreras.id')
            ->select('maestros.*', 'carreras.nombre AS nom_carrera')
            ->get();

        $vista = view('maestrospdf', compact('maestros'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('MaestrosPDF.pdf');
    }
}
