<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ejemploController extends Controller
{
    //
    public function index(){
    	$edad = 22;
    	$nombre = "Hector";
    	return view('ejemplo', compact('edad', 'nombre'));
    }
}
