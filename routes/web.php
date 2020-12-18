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
//     return view('index');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/mahasiswa', function () {
//     return view('mahasiswa');
// });

Route::get('/' , 'PagesController@home');
Route::get('/experience' , 'PagesController@about');
Route::get('/portofolio' , 'MahasiswaController@index');

// students
// Route::get('/students' , 'StudentsController@index');
// Route::get('/students/create' , 'StudentsController@create');
// Route::get('/students/{student}' , 'StudentsController@show');
// Route::post('/students' , 'StudentsController@store');

// Route::delete('/students/{student}', 'StudentsController@destroy');
// Route::get('/students/{student}/edit','StudentsController@edit');
// Route::patch('/students/{student}','StudentsController@update');

Route::resource('students','StudentsController');
Route::get('/student/cari','StudentsController@cari');
Route::get('/cari', 'StudentsController@loadData');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');