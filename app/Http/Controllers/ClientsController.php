<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function listar(){
        $clients = \App\Client::all();
        return view('admin.cliente.list', compact('clients'));
    }

    public function formCadastrar(){
        return view('admin.cliente.create');
    }

    public function cadastrar(Request $request){
        $client = new \App\Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();
        return redirect()->to('/admin/client');
    }

    public function formEditar($id){
        $client = \App\Client::find($id);
        if(!$client){
            abort(404);
        }
        return view('admin.cliente.edit', compact('client'));
    }

    public function editar(Request $request, $id){
        $client = \App\Client::find($id);
        if(!$client){
            abort(404);
        }
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();
        return redirect()->to('/admin/client');
    }

    // public function cadastrar(){
    // 	$nome = 'Jose Roberto';
    // 	$idade = '31 anos';

    // 	return view('cliente.cadastrar')
    // 	->with('n',$nome)
    // 	->with('v',$idade);
    // }

    public function excluir(Request $request, $id){
    	$client = \App\Client::find($id);
        if(!$client){
            abort(404);
        }
        $client->delete();
        return redirect()->to('/admin/client');
    }
}
