<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Alumnos;
use App\Cargas;

class cargasController extends Controller
{
    //

    public function cargarMateria($id){
        $alumno = Alumnos::find($id);

        $grupos = DB::table('alumnos_grupos')
            ->join('grupos', 'grupos.id', '=', 'alumnos_grupos.grupo_id')
            ->where('alumnos_grupos.alumno_id', '=', $id)
            ->pluck('grupos.id');

        $lista_grupos = DB::table('grupos')
            ->whereNotIn('grupos.id', $grupos)
            ->join('materias', 'materias.id', '=', 'grupos.materia_id')
            ->join('maestros', 'maestros.id', '=', 'grupos.maestro_id')
            ->select('grupos.*', 'materias.nombre AS materia_nom')
            ->get();

        $materias = DB::table('grupos')
            ->whereIn('grupos.id', $grupos)
            ->join('materias', 'materias.id', '=', 'grupos.materia_id')
            ->join('maestros', 'maestros.id', '=', 'grupos.maestro_id')
            ->select('grupos.*', 'materias.nombre AS nom_materia', 'maestros.nombre AS nom_maestro')
            ->get();

        return view('cargarMaterias', compact('alumno', 'lista_grupos', 'materias'));
    }

    public function cargarGrupo($id, Request $request){
        $grupo = new Cargas();
        $grupo->alumno_id = $id;
        $grupo->grupo_id = $request->input('grupo_id');
        $grupo->save();

        return redirect('/cargarMaterias/'.$id);
    }

    public function darBaja($id, $id_grupo){
        DB::table('alumnos_grupos')
            ->where('alumnos_grupos.grupo_id', '=', $id_grupo)
            ->where('alumnos_grupos.alumno_id', '=', $id)
            ->delete();

        return redirect('/cargarMaterias/'.$id);
    }

    public function registrarCalificacion($id_grupo){
        $grupo_alumnos = DB::table('alumnos_grupos')
            ->join('alumnos', 'alumnos.id', '=', 'alumnos_grupos.alumno_id')
            ->where('alumnos_grupos.grupo_id', '=', $id_grupo)
            ->select('alumnos.nombre as nom_alumno', 'alumnos.id as id_alumno', 'alumnos.numero_control AS control', 'alumnos_grupos.calificacion')
            ->get();

        $grupo_datos = DB::table('grupos')
            ->where('grupos.id', $id_grupo)
            ->join('materias', 'materias.id', '=', 'grupos.materia_id')
            ->select('grupos.id', 'materias.nombre', 'grupos.hora_clase')
            ->first();

        return view('/subirCalificaciones', compact('grupo_alumnos', 'grupo_datos'));
    }

    public function subirCalificaciones($id_grupo, Request $request){
        $calificacion = $request->input('calificacion');

        foreach($calificacion as $c => $value){
            DB::table('alumnos_grupos')
                ->where('alumnos_grupos.grupo_id', '=', $id_grupo)
                ->where('alumnos_grupos.alumno_id', '=', $c)
                ->update(['alumnos_grupos.calificacion' => $value]);
        }

        return redirect('/listaAlumnos/'.$id_grupo);
    }
}
