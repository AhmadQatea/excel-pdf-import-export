<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/users' , [UserController::class , 'index'])->name('user.index');
Route::post('/users/import' , [UserController::class , 'import'])->name('user.import');
Route::post('/users/export' , [UserController::class , 'import'])->name('user.export');
Route::post('/users/downloadPdf' , [UserController::class , 'downloadPdf'])->name('user.downloadPdf');
Route::post('/users/update' , [UserController::class , 'update'])->name('user.update');
Route::post('/users/delete' , [UserController::class , 'delete'])->name('user.delete');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/users/delete-all', [UserController::class, 'deleteAll'])->name('user.deleteAll');


