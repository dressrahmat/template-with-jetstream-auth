<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Roles\RolesIndex;
use App\Livewire\Admin\Users\UsersIndex;
use App\Livewire\Admin\Users\UsersImport;
use App\Livewire\Admin\Profiles\ProfilesEdit;
use App\Livewire\Admin\Profiles\ProfilesShow;
use App\Livewire\Admin\Profiles\ProfilesCreate;
use App\Livewire\Admin\Permissions\PermissionsIndex;

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

    
    });
    
    
    Route::middleware([
        'auth',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        
        Route::get('/permissions', PermissionsIndex::class)->name('permissions.index');
        
        Route::get('/roles', RolesIndex::class)->name('roles.index');
        
        Route::get('/user', UsersIndex::class)->name('users.index');
        
        Route::get('/profile-show/{user}', ProfilesShow::class)->name('profiles.show');
        
        Route::get('/profile-create/{user}', ProfilesCreate::class)->name('profiles.create');
        
        Route::get('/profile-edit/{user}', ProfilesEdit::class)->name('profiles.edit');
        
});