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

//Get Routes
Route::get('/clasica', [
		'uses'	=>	'EncriptController@clasica',
		'as'	=>	'encript.clasica']);

Route::get('/moderna/des', [
		'uses'	=>	'EncriptController@des',
		'as'	=>	'encript.des']);

Route::get('/moderna/tripledes', [
		'uses'	=>	'EncriptController@tripledes',
		'as'	=>	'encript.tripledes']);

Route::get('/moderna/aes', [
		'uses'	=>	'EncriptController@aes',
		'as'	=>	'encript.aes']);


//Post Routes
//DES
Route::post('/moderna/des/encript', [
	'uses' => 'EncriptController@despostEncript',
	'as' => 'encript.despost']);

Route::post('/moderna/des/desencript', [
	'uses' => 'EncriptController@despostDesencript',
	'as' => 'desencript.despost']);

//3DES
Route::post('/moderna/tripledes/encript', [
	'uses' => 'EncriptController@tripledespostEncript',
	'as' => 'encript.tripledespost']);

Route::post('/moderna/tripledes/desencript', [
	'uses' => 'EncriptController@tripledespostDesencript',
	'as' => 'desencript.tripledespost']);

//AES
Route::post('/moderna/aes/encript', [
	'uses' => 'EncriptController@aespostEncript',
	'as' => 'encript.aespost']);

Route::post('/moderna/aes/desencript', [
	'uses' => 'EncriptController@aespostDesencript',
	'as' => 'desencript.aespost']);