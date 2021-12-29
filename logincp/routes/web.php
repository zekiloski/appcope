<?php

use App\Http\Controllers\PerfilController;
use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function(){
  Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');  
    Route::view('perfil', 'perfil')->name('perfil');
    Route::put('perfil', [PerfilController::class, 'update'])->name('perfil.update');
});

require __DIR__.'/auth.php';
