<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function cadastrar(){
    	$nome = 'Jose Roberto';
    	$idade = '31 anos';

    	return view('cliente.cadastrar')
    	->with('n',$nome)
    	->with('v',$idade);
    }

    public function excluir(){
    	
    }

    public function editar(){

    }
}
