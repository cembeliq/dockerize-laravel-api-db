<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;


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
Route::get('create', [PaymentsController::class, 'create'])->name('payment.create');
Route::post('store', [PaymentsController::class, 'store'])->name('payment.store');
Route::post('delete', [PaymentsController::class, 'destroy'])->name('payment.delete');
Route::get('/{page?}', [PaymentsController::class, 'index'])->name('payment.index');
