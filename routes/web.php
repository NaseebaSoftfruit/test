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

Route::get('/', function () {
    return view('welcome');
});
Route::get('addTask','Auth\TaskController@addTask');
Route::get('addType','Auth\TypeController@addType');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('assignTask', 'Auth\TaskController@store');

Route::post('add_type',[
    'as'=>'add_type','uses'=>'Auth\TypeController@store']);

