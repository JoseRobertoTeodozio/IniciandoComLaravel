<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

//Model - View - Controller
//StudlyCaps
Route::get('/', function () {
    return view('welcome');
});

Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');

Route::group(['prefix' => '/'],function(){
	Route::get('cliente/cadastrar', 'ClientsController@cadastrar');
	Route::get('env', function(){
		var_dump(getenv('NOME'));
	});
});

Route::group(['prefix' => '/admin'],function(){
	Route::get('/client', 'ClientsController@listar');
	Route::get('/client/form-cadastrar', 'ClientsController@formCadastrar');
	Route::post('/client/cadastrar', 'ClientsController@cadastrar');
	Route::get('/client/{id}/form-editar', 'ClientsController@formEditar');
	Route::post('/client/{id}/editar', 'ClientsController@editar');
	Route::get('/client/{id}/excluir', 'ClientsController@excluir');
	// Route::get('cliente/cadastrar', 'ClientsController@cadastrar');
});

Route::get('/blade', function(){
	/*$nome = 'Jose Roberto';
	$variavel = 'valor 20';

	return view('test')
	->with('n',$nome)
	->with('v',$variavel);
*/
	return view('test', ['nome' => 'lucas teodozio', 'idade' => '6 anos']);
});

Route::get('cliente/cadastrar', function(){
	// return view('cliente.cadastrar', [ 'nome' => 'Jose Roberto', 'variavel' => 'valor 5']);

	/*$n = 'Jose Roberto';
	$v = 'valor2';
	return view('cliente.cadastrar', compact('n', 'v'));
	*/
	$nome = 'Jose Roberto';
	$variavel = 'valor 10';
	return view('cliente.cadastrar')
	->with('n',$nome) ->with('v', $variavel);
	
});

Route::get('/cliente', function(){
	//csrf - token
	$csrfToken = csrf_token();
	$html = <<<HTML
	<html>
	<body>
		<h1>Cliente</h1>
		<form method="post" action="cliente/cadastrar">
			<input type="hidden" name="_token" value="$csrfToken">
			<input type="text" name="nome">
			<button type="submit">Enviar</button>
		</form>
	</body>
	</html>
HTML;
	return $html;
});

Route::get('/admin/cliente', function(){
	return "Admin - Hello World";
});

Route::get('/cliente-echo', function(){
	echo "Texto com echo";
});

Route::get('/produto/{name}', function($name){
	echo "produto $name";
});

Route::get('/fornecedor/{name}/{id?}', function($name, $id = 1000){
	echo "fornecedor $name $id";
});

Route::get('/testeComLaravel', function(){
	/*return view('cliente.testeLaravel', ['b'=> 'Bem vindo ao Laravel', 'teste' => 'testando uma aplicação Laravel']);
	*/
	$rota = 'Rota maritima';
	$percurso = 'Percurso para o caminho das Indias';

	return view('cliente.testeLaravel')
		->with('r',$rota)
		->with('p',$percurso);
});

Route::get('/test1', function(){
	$t = 'Tenho valor';
	$p = 'have value';
	return view('teste1')
	->with('test',$t)
	->with('in',$p);
});

Route::get('/for-if/{v}', function($val){
	return view('for-if')
	->with('value',$val)
	->with('myArray',[
		'chave1'=>'valor1',
		'chave2'=>'valor2',
		'chave3'=>'valor3',
		'chave4'=>'valor4',
		'chave5'=>'valor5'
	]);
});