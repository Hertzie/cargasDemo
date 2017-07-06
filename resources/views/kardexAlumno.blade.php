<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF del Grupo</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

        body {
            font-family: "Roboto", helvetica, arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            text-rendering: optimizeLegibility;
        }

        div.table-title {
            display: block;
            margin: auto;
            max-width: 600px;
            padding:5px;
            width: 100%;
        }

        .table-title h3 {
            color: #fafafa;
            font-size: 30px;
            font-weight: 400;
            font-style:normal;
            font-family: "Roboto", helvetica, arial, sans-serif;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            text-transform:uppercase;
        }

        .table-fill {
            background: white;
            border-radius:3px;
            border-collapse: collapse;
            height: 320px;
            margin: auto;
            max-width: 600px;
            padding:5px;
            width: 100%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            animation: float 5s infinite;
        }

        th {
            color:#D5DDE5;;
            background:#1b1e24;
            border-bottom:4px solid #9ea7af;
            border-right: 1px solid #343a45;
            font-size:23px;
            font-weight: 100;
            padding:24px;
            text-align:left;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            vertical-align:middle;
        }

        th:first-child {
            border-top-left-radius:3px;
        }

        th:last-child {
            border-top-right-radius:3px;
            border-right:none;
        }

        tr {
            border-top: 1px solid #C1C3D1;
            border-bottom-: 1px solid #C1C3D1;
            color:#666B85;
            font-size:16px;
            font-weight:normal;
            text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
        }

        tr:hover td {
            background:#4E5066;
            color:#FFFFFF;
            border-top: 1px solid #22262e;
            border-bottom: 1px solid #22262e;
        }

        tr:first-child {
            border-top:none;
        }

        tr:last-child {
            border-bottom:none;
        }

        tr:nth-child(odd) td {
            background:#EBEBEB;
        }

        tr:nth-child(odd):hover td {
            background:#4E5066;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius:3px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius:3px;
        }

        td {
            background:#FFFFFF;
            padding:20px;
            text-align:left;
            vertical-align:middle;
            font-weight:300;
            font-size:18px;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #C1C3D1;
        }

        td:last-child {
            border-right: 0px;
        }

        th.text-left {
            text-align: left;
        }

        th.text-center {
            text-align: center;
        }

        th.text-right {
            text-align: right;
        }

        td.text-left {
            text-align: left;
        }

        td.text-center {
            text-align: center;
        }

        td.text-right {
            text-align: right;
        }
    </style>
</head>
<body>
<div style="text-align:center;">
    <img src="img/logo.png" width="100px" alt="">
</div>
<br>
<h1 align="center"><strong>Kardex del Alumno</strong></h1> <br>
<div>
    <label float="left">Nombre:</label>
    &nbsp;
    <label float="left"><strong>{{$alumno->nombre}}</strong></label>
    &nbsp;
    <label float="center">Número de Control:</label>
    &nbsp;
    <label float="center"><strong>{{$alumno->numero_control}}</strong></label>
    &nbsp;
</div>

<br><br>

<table align="center">
    <thead>
    <tr>
        <th>Nombre de materia</th>
        <th>Hora</th>
        <th>Maestro</th>
        <th>Calificacion</th>
    </tr>
    @foreach($grupos as $g)
        <tr>
            <td>{{$g->id_materia}}</td>
            <td>{{$g->hora}}</td>
            <td>{{$g->nom_maestro}}</td>
            <td>{{$g->calificacion}}</td>
        </tr>
    @endforeach
    </thead>
</table>

{{$grupos->links()}}
<br><br>
<footer>
    <div style="text-align:center;">
        <span>Ing. Web &copy; 2017</span>
    </div>

</footer>
</body>
</html>