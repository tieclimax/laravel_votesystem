<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::post('/', 'WelcomeController@index')->name('checkstatus');
Route::get('/login', 'auth\LoginController@index')->name('showlogin');
Route::post('/login', 'auth\LoginController@login')->name('login');
Route::get('/logout', 'auth\LoginController@logout')->name('logout');

Route::get('/vote', 'VoteController@index')->name('vote');
Route::post('/vote/step2', 'VoteController@step1')->name('step2');
Route::post('/vote/step3', 'VoteController@step2')->name('step3');
Route::post('/vote/step4', 'VoteController@step3')->name('step4');
Route::post('/vote/step5', 'VoteController@step4')->name('step5');
Route::post('/vote/step6', 'VoteController@step5')->name('step6');
Route::get('/scores', 'VoteController@showscores')->name('scores');
Route::post('/scores', 'VoteController@selectSub')->name('getsubject');

Route::get('/setzero', 'VoteController@setzero')->name('setzero');
