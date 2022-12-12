<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\VisitorController;
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


Route::get('/', [VisitorController::class,'index'])->name('VPage');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/categories',[CategoryController::class, 'show'])->name('cat.show');
Route::post('/categories',[CategoryController::class, 'store'])->name('cat.store');
Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('cat.edit');
Route::post('/categories/{id}',[CategoryController::class,'update'])->name('cat.update');
Route::get('/categories/delete/{id}',[CategoryController::class, 'delete'])->name('cat.delete');

// meals

Route::get('/meals',[MealController::class,'index'])->name('meal.index');
Route::get('/meal/create', [MealController::class,'create'])->name('meal.create');
Route::post('/meal/store' ,[MealController::class ,'store'])->name('meal.store');
