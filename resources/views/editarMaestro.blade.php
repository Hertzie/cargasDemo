@extends('master')

@section('contenido')
	<h1 class="lead" align="center"><strong>Editar Maestro</strong></h1>
	<form action="{{url('/actualizarMaestro')}}/{{$maestro->id}}" method="POST">
		<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" name="nombre" required value="{{$maestro->nombre}}">
		</div>
		<div class="form-group">
			<label for="carrera">Carrera:</label>
			<select name="carrera" class="form-control">
				<option value="{{$maestro->carrera_id}}">{{$maestro->nom_carrera}}</option>
				@foreach($carreras as $c)
					<option value="{{$c->id}}">{{$c->nombre}}</option>
				@endforeach
			</select>
		</div>
			<div class="form-group">
			<label for="materia">Materia:</label>
			<select name="materia" class="form-control">
				<option value="{{$maestro->materia_id}}">{{$maestro->nom_materia}}</option>
				@foreach($materias as $m)
					<option value="{{$m->id}}">{{$m->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Actualizar</button>
			<a href="{{url('/consultarMaestro')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>
@stop