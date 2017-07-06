@extends('master')

@section('contenido')
	
	<h1 class="lead" align="center"><strong>Alumnos inscritos al Grupo</strong></h1> <br>
	<div class="form-group">
		<label class ="lead" float="left">Nombre del Maestro:</label>
		&nbsp;&nbsp;&nbsp;
		<label class= "lead" float="left"><strong>{{$grupo->nom_maestro}}</strong></label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label class= "lead" float="center">Hora de la clase:</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label class= "lead" float="center"><strong>{{$grupo->hora_clase}}</strong></label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label class= "lead" float="right">Materia:</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label class= "lead" float="right"><strong>{{$grupo->nom_materia}}</strong></label>
	</div>

	<table class="table table-striped">
	<thead>
		<tr>
			<th>No. Control</th>
			<th>Nombre</th>
			<th>Calificacion</th>
		</tr>
		@foreach($alumnos as $a)
			<tr>
				<td>{{$a->control}}</td>
				<td>{{$a->nom_alumno}}</td>
				<td>{{$a->calificacion}}</td>
			</tr>
		@endforeach
	</thead>

	</table>
	{{$alumnos->links()}}
	<div align="center">
		<a href="{{url('/consultarGrupo')}}" class="btn btn-success">Regresar</a>
	</div>

@stop