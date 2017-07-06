@extends('master')

@section('contenido')

	<script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
	</script>

	<h1 class="lead" align="center"><strong>Listado de Materias</strong></h1>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Carrera</th>
			<th>Opciones</th>
		</tr>
		@foreach($materias as $m)
			<tr>
				<td>{{$m->id}}</td>
				<td>{{$m->nombre}}</td>
				<td>{{$m->nom_carrera}}</td>
				<td>
					<a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarMateria')}}/{{$m->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</a>
				</td>

			</tr>
		@endforeach
		<div align="center">
			<a href="{{url('/materiaspdf')}}" class="btn btn-success">PDF</a>
		</div>
	</thead>
	</table>
	{{$materias->links()}}
	<div align="center">
		<a href="{{url('/registrarMateria')}}" class="btn btn-success">+Nueva Materia</a>
	</div>
@stop