<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Carreras;
use App\Maestros;
use App\Materias;
use App\Grupos;
use App\Alumnos;
use PDF;

class gruposController extends Controller
{
    //

    public function registrar(){

    	$grupos = Grupos::all();
    	$carreras = Carreras::all();
    	$maestros = Maestros::all();
    	$materias = Materias::all();
    	$horas = array('07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');
    	return view('/registrarGrupo', compact('grupos', 'carreras', 'maestros', 'materias', 'horas'));

    }

    public function guardar(Request $request){
    	$grupo = new Grupos();
    	$grupo->carrera_id = $request->input('carrera');
    	$grupo->maestro_id = $request->input('maestro');
    	$grupo->materia_id = $request->input('materia');
    	$grupo->hora_clase = $request->input('hora');
    	$grupo->save();
    	return redirect('/consultarGrupo');
    }

    public function consultar(){
    	$grupos = DB::table('grupos')
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->select('grupos.*', 'carreras.nombre AS nom_carrera', 'maestros.nombre AS nom_maestro', 'materias.nombre AS nom_materia')
            ->paginate(10);
    	return view('/consultarGrupo', compact('grupos'));

    }

    public function actualizar($id, Request $request){
    	$grupo = Grupos::find($id);
        $grupo->carrera_id = $request->input('carrera');
        $grupo->maestro_id = $request->input('maestro');
        $grupo->materia_id = $request->input('materia');
        $grupo->hora_clase = $request->input('hora');
        $grupo->save();

        return redirect('/consultarGrupo');
    }

    public function eliminar($id){
    	$grupo = Grupos::find($id);
        $grupo->delete();
        return redirect('/consultarGrupo');
    }

    public function editar($id){
    	$grupo = DB::table('grupos')
            ->where('grupos.id', '=', $id)
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->select('grupos.*', 'carreras.nombre AS nom_carrera', 'maestros.nombre AS nom_maestro', 'materias.nombre AS nom_materia')
            ->first();

        $horas = array('07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');   
        $carreras = Carreras::all();
        $materias = Materias::all();
        $maestros = Maestros::all();
        return view('/editarGrupo', compact('grupo', 'carreras','materias', 'maestros', 'horas'));
    }

    public function lista($id){
        $grupo = DB::table('grupos')
            ->where('grupos.id', '=', $id)
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->select('grupos.*', 'carreras.nombre AS nom_carrera', 'maestros.nombre AS nom_maestro', 'materias.nombre AS nom_materia')
            ->first();

        $alumnos = DB::table('alumnos_grupos')
            ->where('alumnos_grupos.grupo_id', '=', $id)
            ->join('alumnos', 'alumnos_grupos.alumno_id', '=', 'alumnos.id')
            ->select('alumnos_grupos.*', 'alumnos.numero_control as control', 'alumnos.nombre AS nom_alumno')
            ->paginate(5);


        return view('/listaAlumnos', compact('grupo', 'alumnos'));
    }

    public function generarPDF($id){
        $grupo = DB::table('grupos')
            ->where('grupos.id', '=', $id)
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->select('grupos.*', 'carreras.nombre AS nom_carrera', 'maestros.nombre AS nom_maestro', 'materias.nombre AS nom_materia')
            ->first();

        $alumnos = DB::table('alumnos_grupos')
            ->where('alumnos_grupos.grupo_id', '=', $id)
            ->join('alumnos', 'alumnos_grupos.alumno_id', '=', 'alumnos.id')
            ->select('alumnos_grupos.*', 'alumnos.numero_control AS control', 'alumnos.nombre AS nom_alumno')
            ->paginate(5);

        $vista=view('listapdf', compact('grupo', 'alumnos'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('ListaGrupos.pdf');
    }

    public function grupospdf(){
        $grupos = DB::table('grupos')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->join('maestros', 'grupos.maestro_id', '=', 'maestros.id')
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->select('grupos.*', 'materias.nombre AS nom_materia', 'maestros.nombre AS nom_maestro', 'carreras.nombre AS nom_carrera')
            ->get();

        $vista = view('grupospdf', compact('grupos'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('GruposPDF.pdf');
    }
}
