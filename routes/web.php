<?php

use App\Http\Controllers\EmploymentController;
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

Route::get('/karyawan',[EmploymentController::class,'index'])->name('karyawan');
Route::get('/createpegawai',[EmploymentController::class,'createpegawai']);
Route::post('/savedata',[EmploymentController::class,'store']);
Route::get('/editdata/{id}',[EmploymentController::class,'edit']);
Route::post('/updatedata/{id}',[EmploymentController::class,'update']);
Route::get('/delete/{id}',[EmploymentController::class,'destroy']);
Route::get('/exportpdf',[EmploymentController::class,'exportpdf']);
