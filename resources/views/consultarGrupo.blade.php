@extends('master')

@section('contenido')
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	<h1 class="lead" align="center"><strong>Listado de Grupos</strong></h1>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Maestro</th>
			<th>Materia</th>
			<th>Carrera</th>
			<th>Hora</th>
			<th>Opciones</th>
		</tr>
		@foreach($grupos as $g)
			<tr>
				<td>{{$g->id}}</td>
				<td>{{$g->nom_maestro}}</td>
				<td>{{$g->nom_materia}}</td>
				<td>{{$g->nom_carrera}}</td>
				<td>{{$g->hora_clase}}</td>
				<td>
					<a href="{{url('listapdf')}}/{{$g->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Generar PDF del grupo">
						<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
					</a>
					<a href="{{url('/registrarCalificaciones')}}/{{$g->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Capturar calificaciones">
						<span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
					</a>
					<a href="{{url('/listaAlumnos')}}/{{$g->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Ver alumnos inscritos">
						<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
					</a>
					<a href="{{url('/editarGrupo')}}/{{$g->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Editar">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarGrupo')}}/{{$g->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
		@endforeach
		<div align="center">
			<a href="{{url('/grupospdf')}}" class="btn btn-success">PDF</a>
		</div>
	</thead>
	</table>
	{{$grupos->links()}}
	<div align="center">
		<a href="{{url('/registrarGrupo')}}" class="btn btn-success">+Nuevo Grupo</a>
	</div>
@stop	