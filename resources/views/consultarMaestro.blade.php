@extends('master')

@section('contenido')

	<script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
	</script>

	<h1 class="lead" align="center"><strong>Listado de Maestros</strong></h1>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Maestro de</th>
			<th>Maestro en</th>
			<th>Opciones</th>
		</tr>
		@foreach($maestros as $m)
			<tr>
				<td>{{$m->id}}</td>
				<td>{{$m->nombre}}</td>
				<td>{{$m->nom_materia}}</td>
				<td>{{$m->nom_carrera}}</td>
				<td>
					<a href="{{url('/editarMaestro')}}/{{$m->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarMaestro')}}/{{$m->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
		@endforeach
		<div align="center">
			<a href="{{url('/maestrospdf')}}" class="btn btn-success">PDF</a>
		</div>
	</thead>
	</table>
	{{$maestros->links()}}
	<div align="center">
		<a href="{{url('/registrarMaestro')}}" class="btn btn-success">+Nuevo Maestro</a>
	</div>
@stop