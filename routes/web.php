<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

    Route::get('/usuarios', static fn() => view('user.index'))->name('user.index');

    Route::get('/usuarios/{user}', static fn($user) => view('user.show', ['user' => User::with('roles')->select(['id', 'name', 'email', 'profile_photo_path'])->findOrFail($user)]))->name('user.show');

    Route::resource('/friends', App\Http\Controllers\UserController::class)
        ->only(['index', 'show'])
        ->names('friends');

    Route::resource('/groups', App\Http\Controllers\GroupController::class)
        ->names('group');

    Route::resource('/events', App\Http\Controllers\EventController::class)
        ->names('events');
});
