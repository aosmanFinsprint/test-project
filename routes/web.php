<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// login page
Route::get('/login', fn() => view('login'))->name('login');

// handle login
Route::post('/login', [AuthController::class, 'login'])->name('login.handle');

// Welcome page
Route::get('/welcome', fn() => view('welcome'));

// Home page - list all users
Route::get('/home', function () {
    $users = User::all();
    return view('home', compact('users'));
});

// Add user form
Route::get('/add-user', fn() => view('add-user'));

// CRUD routes
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

