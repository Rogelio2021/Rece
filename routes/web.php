<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;  
use App\Http\Controllers\Empleado1Controller;
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
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create',[EmpleadoController::class,'create']);
*/
//Rutas para Mexico
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);


Route::get('/home', function () {
    return view('home');
});

/*
Route::get('/home', [EmpleadoController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'], function(){

    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
*/


//Rutas para USA

/*
Route::get('/empleado1', function () {
    return view('empleado1.index1');
});

Route::get('/empleado1/create1', [Empleado1Controller::class,'create']);
*/
Route::resource('/empleado1', Empleado1Controller::class)->middleware('auth');