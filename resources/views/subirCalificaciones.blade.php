@extends('master')

@section('contenido')

    <h2>Materia: {{$grupo_datos->nombre}} Hora: {{$grupo_datos->hora_clase}}</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form action="{{url('/subirCalificaciones')}}/{{$grupo_datos->id}}" method="POST">
                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de Control</th>
                            <th>Alumno</th>
                            <th>Calificación</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($grupo_alumnos as $grupo)
                            <tr>
                                <td>{{$grupo->id_alumno}}</td>
                                <td>{{$grupo->control}}</td>
                                <td>{{$grupo->nom_alumno}}</td>
                                <td>
                                    <input class="form-control" type="number" name="calificacion[{{$grupo->id_alumno}}]" required value="{{$grupo->calificacion}}">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Capturar Calificacion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop