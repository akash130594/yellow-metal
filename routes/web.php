<?php

use App\Http\Controllers\TestController;
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

Route::get('/list', [TestController::class, 'list'])->name('list');
Route::get('/edit/{id}/{toppinId}', [TestController::class, 'edit'])->name('edit');
Route::post('/update/{id}/{toppinId}', [TestController::class, 'update'])->name('update');
Route::get('/delete/{id}/{toppinId}', [TestController::class, 'delete'])->name('delete');
