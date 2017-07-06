<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Alumnos;
use App\Grupos;
use App\Cargas;
use DB;
use PDF;

class registrarController extends Controller
{
    public function registrar(){
    	$carreras = Carreras::all();

    	return view('registrarAlumno', compact('carreras', 'grupos'));
    }

    public function guardar(Request $datos){
    	$alumno = new Alumnos();
    	$alumno->nombre = $datos->input('nombre');
    	$alumno->numero_control = $datos->input('control');
    	$alumno->edad = $datos->input('edad');
    	$alumno->sexo = $datos->input('sexo');
    	$alumno->carrera_id = $datos->input('carrera');
    	$alumno->save();
        flash('Se ha guardado el alumno exitosamente!')->success();

    	return redirect('/consultar');
    }

    public function consultar(){
    	//$alumnos = Alumnos::paginate(5);
        $alumnos = DB::table('alumnos')
            ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
            ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
            ->paginate(5);
            
    	return view('consultar', compact('alumnos'));
    }

    public function eliminar($id){
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('/consultar');
    }

    public function editar($id){
        $alumno = DB::table('alumnos')
            ->where('alumnos.id', '=', $id)
            ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
            ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
            ->first();

        $carreras = Carreras::all();
        return view('editarAlumno', compact('alumno', 'carreras'));
    }

    public function actualizar($id, Request $datos){
        $alumno = Alumnos::find($id);
        $alumno->nombre = $datos->input('nombre');
        $alumno->numero_control = $datos->input('control');
        $alumno->edad = $datos->input('edad');
        $alumno->sexo = $datos->input('sexo');
        $alumno->carrera_id = $datos->input('carrera');
        $alumno->save();

        return redirect('/consultar');

    }

    public function kardexPDF($id){
        $alumno = Alumnos::find($id);

        $grupos = DB::table('alumnos_grupos')
            ->where('alumnos_grupos.alumno_id', '=', $id)
            ->join('grupos', 'grupos.id', '=', 'alumnos_grupos.grupo_id')
            ->select('alumnos_grupos.*', 'grupos.materia_id AS id_materia', 'grupos.hora_clase AS hora', 'grupos.maestro_id AS nom_maestro')
            ->paginate(5);

        $vista=view('kardexAlumno', compact('alumno', 'grupos'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('KardexPDF.pdf');
    }

    public function alumnospdf(){
        $alumnos = DB::table('alumnos')
            ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
            ->select('alumnos.*','carreras.nombre AS nom_carrera')
            ->get();

        $vista = view('alumnospdf', compact('alumnos'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('AlumnosPDF.pdf');
    }
}
