<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Rewards\RewardsIndex;
use App\Livewire\Select2\Select2Index;
use App\Livewire\Services\ServicesIndex;
use App\Livewire\Customers\CustomersIndex;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('customer', CustomersIndex::class)->name('customers.index');
    Route::get('service', ServicesIndex::class)->name('services.index');
    Route::get('reward', RewardsIndex::class)->name('rewards.index');
    Route::get('select', Select2Index::class)->name('select.index');
});
