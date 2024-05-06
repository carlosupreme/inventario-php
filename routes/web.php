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

    Route::get('/usuarios', static fn() => view('user.index'))
//        ->middleware('can:user.index')
        ->name('user.index');

    Route::get('/usuarios/{user}', static fn($user) => view('user.show', [
        'user' => User::with('roles')->select(['id', 'name', 'email', 'profile_photo_path'])->findOrFail($user)
    ]))->name('user.show');


    Route::get('/productos' , function(){
        return view('product.index');
    })->name('product.index');

    Route::get('/productos/create' , function(){
        return view('product.create');
    })->name('product.create');

    Route::get('/productos/{product}' , function($product){
        return view('product.show', ['product' => $product]);
    })->name('product.show');

    Route::get('/productos/{product}/edit' , function($product){
        return view('product.edit', ['product' => \App\Models\Producto::findOrFail($product)]);
    })->name('product.edit');



});
