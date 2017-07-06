@extends('master')

@section('contenido')

	<script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
	</script>

	<h1 class="lead" align="center"><strong>Listado de Alumnos</strong></h1>
	@include('flash::message')
	<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>No. Control</th>
			<th>Edad</th>
			<th>Sexo</th>
			<th>Carrera</th>
			<th>Opciones</th>
		</tr>
		@foreach($alumnos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->numero_control}}</td>
				<td>{{$a->edad}}</td>
				<td>
					@if($a->sexo==0)
						Femenino
					@else
						Masculino
					@endif
				</td>
				<td>{{$a->nom_carrera}}</td>
				<td>
					<a href="{{url('/cargarMaterias')}}/{{$a->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cargar Materias">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</a>
					<a href="{{url('/kardexpdf')}}/{{$a->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Imprimir Kardex">
						<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
					</a>
					<a href="{{url('/editarAlumno')}}/{{$a->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminar')}}/{{$a->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
		@endforeach
		<div align="center">
			<a href="{{url('/alumnospdf')}}" class="btn btn-success">PDF</a>
		</div>
	</thead>
	</table>
	{{$alumnos->links()}}
	<div align="center">
		<a href="{{url('/registrarAlumno')}}" class="btn btn-success">+Nuevo Alumno</a>
	</div>
@stop