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

Route::get('/', function () {
    return redirect(route('index'));
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [App\Http\Controllers\RedirectController::class, 'index'])->name('index');
    Route::get('/admin/add', [App\Http\Controllers\RedirectController::class, 'add'])->name('add');
    Route::get('/admin/edit/{redirect:slug}', [App\Http\Controllers\RedirectController::class, 'edit'])->name('edit');
    Route::patch('/admin/update/{redirect:slug}', [App\Http\Controllers\RedirectController::class, 'update'])->name('update');
    Route::post('/admin/add', [App\Http\Controllers\RedirectController::class, 'store'])->name('store');
    Route::delete('/admin/delete/{redirect:slug}', [App\Http\Controllers\RedirectController::class, 'delete'])->name('delete');

});

Auth::routes(['register' => false]);
Route::get('/{redirect:slug}', [App\Http\Controllers\RedirectController::class, 'redirect'])->name('redirect');
