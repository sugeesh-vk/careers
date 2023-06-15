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
// });
// Route::get('/d','\App\Http\Controllers\admin\AdminController');
Route::get('/','\App\Http\Controllers\Controller@index');
Route::get('/create_careers','\App\Http\Controllers\Admin\AdminController@createcareers');
Route::post('/save_careers','\App\Http\Controllers\ApplicantsController@save');
Route::get('/search','\App\Http\Controllers\Controller@search');
Route::get('/searchjobs','\App\Http\Controllers\Controller@jobs');
Route::get('/viewapplicant/{id}','\App\Http\Controllers\Controller@jobsview');
Route::get('/applicantdetete/{id}','\App\Http\Controllers\Controller@deleteapplicant');

Route::post('/careerssave','\App\Http\Controllers\Admin\AdminController@save');
