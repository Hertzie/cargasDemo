@extends('master')

@section('contenido')
	<h1 class="lead" align="center"><strong>Registrar Alumno</strong></h1>
	<form action="{{url('/guardarAlumno')}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" name="nombre" required>

		</div>
		<div class="form-group">
			<label for="control">Número de Control:</label>
			<input type="text" class="form-control" name="control"required>
		</div>
		<div class="form-group">
			<label for="edad">Edad:</label>
			<input type="number" class="form-control" name="edad" required>
		</div>
		<div class="form-group">
			<label for="sexo">Sexo:</label>
			<select name="sexo" class="form-control">
				<option value="0" selected="">Femenino</option>
				<option value="1">Masculino</option>
			</select>
		</div>
		<div class="form-group">
			<label for="carrera">Carrera:</label>
			<select name="carrera" class="form-control">
				@foreach($carreras as $c)
					<option value="{{$c->id}}">{{$c->nombre}}</option>
				@endforeach
			</select>
		</div>

		<div>
			<button type="submit" class="btn btn-primary">Registrar</button>
			<a href="{{url('/consultar')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>
@stop