<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/edit-todo/{id}', [TODOController::class, 'edit'])->name('edit.todo');
    Route::get('/delete-todo/{id}', [TODOController::class, 'destroy'])->name('delete.todo');
    Route::post('/store-todo',[TODOController::class,'store'])->name('store.todo');
    Route::post('/update-todo/{id}',[TODOController::class,'update'])->name('update.todo');

    Route::get('/task-list/{id}',[TaskController::class,'index'])->name('task.list');
    Route::post('/task-create',[TaskController::class,'store'])->name('store.task');
    Route::get('/delete-task/{id}', [TaskController::class, 'destroy'])->name('delete.task');
    Route::get('/edit-task/{id}', [TaskController::class, 'edit'])->name('edit.task');
    Route::post('/update-task/{id}',[TaskController::class,'update'])->name('update.task');
});




