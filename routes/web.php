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

Route::get('/', 'userController@index');
Route::get('/login', 'userController@login');
Route::post('/LoginPost', 'userController@loginPost');
Route::get('/user', 'userController@view');
Route::post('/register', 'userController@input');
Route::get('/{id}/editUser', 'userController@edit');
Route::put('/{id}/updateUser', 'userController@update');
Route::get('/logout', 'userController@logout');
Route::delete('/{id}/deleteUser', 'userController@delete');
Route::get('/obat', 'obatController@index');
Route::get('/jenis', 'jenisController@index');
Route::post('/tambahjenis', 'jenisController@input');
Route::get('/{id}/editjenis', 'jenisController@edit');
Route::put('/{id}/updatejenis', 'jenisController@update');
Route::delete('/{id}/deletejenis', 'jenisController@delete');
Route::get('/kategori', 'kategoriController@index');
Route::post('/tambahkategori', 'kategoriController@input');
Route::get('/{id}/editkategori', 'kategoriController@edit');
Route::put('/{id}/updatekategori', 'kategoriController@update');
Route::delete('/{id}/deletekategori', 'kategoriController@delete');

