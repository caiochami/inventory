<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire;

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

Route::view('/', 'welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/categories', Livewire\Categories\Index::class)->name('categories.index');

    Route::get('/locations', Livewire\Locations\Index::class)->name('locations.index');

    Route::get('/metrics', Livewire\Metrics\Index::class)->name('metrics.index');

    Route::get('/suppliers', Livewire\Suppliers\Index::class)->name('suppliers.index');
});
