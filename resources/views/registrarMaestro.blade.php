@extends('master')

@section('contenido')
	<h1 class="lead" align="center"><strong>Registrar Maestro</strong></h1>
	<form action="{{url('/guardarMaestro')}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" name="nombre" required>

		</div>
		<div class="form-group">
			<label for="carrera">Carrera:</label>
			<select name="carrera" class="form-control">
				@foreach($carreras as $c)
					<option value="{{$c->id}}">{{$c->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="materia">Materia a impartir:</label>
			<select name="materia" class="form-control">
				@foreach($materias as $m)
					<option value="{{$m->id}}">{{$m->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Registrar</button>
			<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>
@stop