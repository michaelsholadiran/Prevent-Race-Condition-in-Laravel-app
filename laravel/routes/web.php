<?php

use Illuminate\Support\Facades\Route;

$balance = 10;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Livewire\WithLock;
use App\Livewire\WithoutLock;
use App\Http\Controllers\WithdrawController;

Route::get('with-lock', WithLock::class)->name('withlock');
Route::get('without-lock', WithoutLock::class)->name('withoutlock');

Route::get('test-lock', function () {
  if (cache()->get('test-lock')) {
    return response()->json([], 405);
  } else {
    cache()->set('test-lock', true);
    return response()->json([], 204);
  }
});

Route::resource('withdraw', WithdrawController::class);
