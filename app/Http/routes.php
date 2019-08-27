<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Routes with login
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration user routes...

    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
    Route::get('auth/unathorized', ['as' => 'unathorized', 'uses' => 'Telefones\DepartamentoController@unathorized']);


Route::group(['middleware' => 'auth', 'prefix' => 'departamento', 'namespace'=>'Telefones','where'=>['id'=>'[0-9]+']], function(){

    Route::get('relatorioTodosTelefones', [ 'as' => 'relatorioTodosTelefones', 'uses' => 'DepartamentoController@relatorioTodosTelefones' ]);
    Route::get('index', [ 'as' => 'index', 'uses' => 'DepartamentoController@index' ]);
    //Route::get('LoadData', [ 'as' => 'LoadData', 'uses' => 'DepartamentoController@LoadData' ]);
    Route::get('destroy/{id}', [ 'as' => 'destroy', 'uses' => 'DepartamentoController@destroy' ]);
    Route::get('show/{id}', [ 'as' => 'show', 'uses' => 'DepartamentoController@show' ]);
    Route::get('edit/{id}', [ 'as' => 'edit', 'uses' => 'DepartamentoController@edit' ]);
    Route::post('store', [ 'as' => 'store', 'uses' => 'DepartamentoController@store' ]);
    Route::post('update/{id}', [ 'as' => 'update', 'uses' => 'DepartamentoController@update' ]);


});

Route::group(['middleware' => 'auth', 'prefix' => 'servico', 'namespace'=>'Servicos','where'=>['id'=>'[0-9]+']], function(){
    
    Route::get('graficoServMes', ['as' => 'graficoServMes', 'uses' => 'ServicosController@graficoServMes']);
    Route::get('graficoDadosServMes', ['as' => 'graficoDadosServMes', 'uses' => 'ServicosController@graficoDadosServMes']);

    Route::post('relatorioData', ['as' => 'relatorioData', 'uses' => 'ServicosController@relatorioData']);
	Route::get('pesquisaData', [ 'as' => 'pesquisaData', 'uses' => 'ServicosController@pesquisaData' ]);
    Route::get('imprimirOS/{id}', ['as' => 'imprimirOS', 'uses' => 'ServicosController@imprimirOS' ]);
    Route::get('index', [ 'as' => 'index', 'uses' => 'ServicosController@index' ]);
    Route::get('showServicosDepartamentos/{id}', [ 'as' => 'showServicosDepartamentos', 'uses' => 'ServicosController@showServicosDepartamentos' ]);
    Route::get('showServicos', [ 'as' => 'showServicos', 'uses' => 'ServicosController@todosServicos' ]);
    Route::get('showServicoDetail/{id}', [ 'as' => 'showServicoDetail', 'uses' => 'ServicosController@showServicoDetail' ]);
    Route::get('showServicosFinal/{id}', [ 'as' => 'showServicosFinal', 'uses' => 'ServicosController@showServicosFinal' ]);
    Route::get('showServicosAgendados', [ 'as' => 'showServicosAgendados', 'uses' => 'ServicosController@servicosAgendados' ]);
    Route::post('store', [ 'as' => 'store', 'uses' => 'ServicosController@store' ]);
    Route::get('destroy/{id}', [ 'as' => 'destroy', 'uses' => 'ServicosController@destroy' ]);
    Route::get('SearchDepartamento/{tag}', [ 'as' => 'SearchDepartamento', 'uses' => 'ServicosController@SearchDepartamento' ]);

});
