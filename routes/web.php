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


Route::get('/', [App\Http\Controllers\Controller::class, 'start'])->name('start');
Route::get('/home', [App\Http\Controllers\Controller::class, 'home'])->name('home');
Route::get('/vocabulary/display', [App\Http\Controllers\Controller::class, 'vocabulary_display'])->name('vocabulary_display');
Route::post('/vocabulary/result', [App\Http\Controllers\Controller::class, 'vocabulary_result'])->name('vocabulary_result');
Route::get('/vocabulary/add', [App\Http\Controllers\Controller::class, 'vocabulary_add'])->name('vocabulary_add');
Route::post('/vocabulary/store', [App\Http\Controllers\Controller::class, 'vocabulary_store'])->name('vocabulary_store');
Route::get('/vocabulary/edit/{id}', [App\Http\Controllers\Controller::class, 'vocabulary_edit'])->name('vocabulary_edit');
Route::post('/vocabulary/update/{id}', [App\Http\Controllers\Controller::class, 'vocabulary_update'])->name('vocabulary_update');
Route::post('/vocabulary/delete/{id}', [App\Http\Controllers\Controller::class, 'vocabulary_delete'])->name('vocabulary_delete');
Route::get('/vocabulary/exam/select', [App\Http\Controllers\Controller::class, 'vocabulary_select'])->name('vocabulary_select');
Route::post('/vocabulary/exam', [App\Http\Controllers\Controller::class, 'vocabulary_exam'])->name('vocabulary_exam');
