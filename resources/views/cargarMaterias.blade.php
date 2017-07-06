
@extends('master')

@section('contenido')
    <h2>Nombre: {{$alumno->nombre}}</h2>
    <hr>
    <form action="{{url('/cargarGrupo')}}/{{$alumno->id}}" method="POST">
        <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Selecciona la materia:</label>
            <select name="grupo_id" class="form-control">
                <option value="0">Selecciona la materia</option>
                @foreach($lista_grupos as $lg)
                    <option value="{{$lg->id}}">{{$lg->materia_nom}} /  {{$lg->hora_clase}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">+Cargar Materia</button>
    </form>
    <h2>Materias del Alumno</h2>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Hora</th>
                    <th>Maestro</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($materias as $m)
                    <tr>
                        <td>{{$m->nom_materia}}</td>
                        <td>{{$m->hora_clase}}</td>
                        <td>{{$m->nom_maestro}}</td>
                        <td>
                            <a href="{{url('/darBaja')}}/{{$alumno->id}}/{{$m->id}}" class="btn btn-xs btn-danger">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop