@extends('master')

@section('contenido')
	<h1 class="lead" align="center"><strong>Registrar Grupo</strong></h1>
	<form action="{{url('/guardarGrupo')}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="carrera">Carrera del grupo:</label>
			<select name="carrera" class="form-control">
				@foreach($carreras as $c)
					<option value="{{$c->id}}">{{$c->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="materia">Materia del grupo:</label>
			<select name="materia" class="form-control">
				@foreach($materias as $m)
					<option value="{{$m->id}}">{{$m->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="maestro">Maestro del grupo:</label>
			<select name="maestro" class="form-control">
				@foreach($maestros as $ma)
					<option value="{{$ma->id}}">{{$ma->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div>
		<div class="form-group">
			<label for="hora">Hora del grupo:</label>
			<select name="hora" class="form-control">
				@foreach($horas as $h)
					<option value="{{$h}}">{{$h}}</option>
				@endforeach
			</select>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Registrar</button>
			<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>
@stop