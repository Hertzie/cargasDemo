@extends('master')

@section('contenido')
	<h1 class="lead" align="center"><strong>Editar Grupo</strong></h1>
	<form action="{{url('/actualizarGrupo')}}/{{$grupo->id}}" method="POST">
		<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="carrera">Carrera:</label>
			<select name="carrera" class="form-control">
				<option value="{{$grupo->carrera_id}}">{{$grupo->nom_carrera}}</option>
				@foreach($carreras as $c)
					<option value="{{$c->id}}">{{$c->nombre}}</option>
				@endforeach
			</select>
		</div>
			<div class="form-group">
			<label for="materia">Materia:</label>
			<select name="materia" class="form-control">
				<option value="{{$grupo->materia_id}}">{{$grupo->nom_materia}}</option>
				@foreach($materias as $m)
					<option value="{{$m->id}}">{{$m->nombre}}</option>
				@endforeach
			</select>
		</div>
		</div>
			<div class="form-group">
			<label for="maestro">Maestro:</label>
			<select name="maestro" class="form-control">
				<option value="{{$grupo->maestro_id}}">{{$grupo->nom_maestro}}</option>
				@foreach($maestros as $ma)
					<option value="{{$ma->id}}">{{$ma->nombre}}</option>
				@endforeach
			</select>
		</div>
		</div>
			<div class="form-group">
			<label for="hora">Hora de la clase:</label>
			<select name="hora" class="form-control">
				<option value="{{$grupo->hora_clase}}">{{$grupo->hora_clase}}</option>
				@foreach($horas as $h)
					<option value="{{$h}}">{{$h}}</option>
				@endforeach
			</select>
		</div>

		<div>
			<button type="submit" class="btn btn-primary">Actualizar</button>
			<a href="{{url('/consultarGrupo')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>
@stop