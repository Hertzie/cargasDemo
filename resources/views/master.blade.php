<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Control Escolar</title>
	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
	<script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SITEC 2017</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menú principal<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/registrarAlumno')}}">Registrar Alumno</a></li>
            <li><a href="{{url('/consultar')}}">Consultar alumnos</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarMateria')}}">Registrar Materia</a></li>
            <li><a href="{{url('/consultarMaterias')}}">Consultar Materias</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarMaestro')}}">Registrar Maestro</a></li>
            <li><a href="{{url('/consultarMaestro')}}">Consultar Maestros</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarGrupo')}}">Registrar Grupo</a></li>
            <li><a href="{{url('/consultarGrupo')}}">Consultar Grupos</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class = "container">
	<div class="row">
		<div class="col-xs-12">
			@yield('contenido')
		</div>
	</div>
</div>
<footer class="text-center">
	<hr>
	Ing. Web &copy; 2017
	
</footer>
<script src="{{asset("js/bootstrap.js")}}"></script>
</body>
</html>