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
    return view('pick_a_card');
});

Route::get('/', 'GameController@pick_a_card')->name('pick_a_card');
Route::get('/initialize/{card_id}', 'GameController@initialize_game')->name('initialize_game');
Route::get('/draw_a_card', 'GameController@draw_a_card')->name('draw_a_card');

Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
