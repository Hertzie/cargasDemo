<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Materias;
use App\Grupos;
use DB;


class materiasController extends Controller
{
    //

    public function registrar(){
    	$carreras = Carreras::all();
    	return view('registrarMateria', compact('carreras'));
    }

    public function guardar(Request $request){
    	$materia = new Materias();
    	$materia->nombre = $request->input('nombre');
    	$materia->carrera_id = $request->input('carrera');
    	$materia->save();

    	return redirect('/consultarMaterias');
    }

    public function consultar(){
    	$materias = DB::table('materias')
            ->join('carreras', 'materias.carrera_id', '=', 'carreras.id')
            ->select('materias.*', 'carreras.nombre AS nom_carrera')
            ->paginate(5);
    	return view('/consultarMaterias', compact('materias'));
    }

    public function eliminar($id){
        $materia = Materias::find($id);
        $materia->delete();
        return redirect('/consultarMaterias');
    }

    public function materiaspdf(){
        $materias = DB::table('materias')
            ->join('carreras', 'materias.carrera_id', '=', 'carreras.id')
            ->select('materias.*', 'carreras.nombre AS nom_carrera')
            ->get();

        $vista = view('materiaspdf', compact('materias'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('MateriasPDF.pdf');
    }

}
