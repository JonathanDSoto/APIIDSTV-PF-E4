<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\ClientsController;

/////////////////////////// User Routes ///////////////////////////
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users/create', [UsersController::class, 'create']);
// Route::get('/users', [UsersController::class, 'store']);
Route::get('/users/{id}', [UsersController::class, 'show']);
// Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
Route::put('/users/{id}', [UsersController::class, 'update']);
Route::delete('/users/{id}', [UsersController::class, 'destroy']);

/////////////////////////// Rate Routes ///////////////////////////
Route::get('/rates', [RatesController::class, 'index']);
Route::get('/rates/create', [RatesController::class, 'create']);
Route::get('/rates/{id}', [RatesController::class, 'show']);
Route::put('/rates/{id}', [RatesController::class, 'update']);
Route::delete('/rates/{id}', [RatesController::class, 'destroy']);

/////////////////////////// Client Routes ///////////////////////////
Route::get('/clients', [ClientsController::class, 'index']);
Route::post('/clients/create', [ClientsController::class, 'create']);
Route::get('/clients/{id}', [ClientsController::class, 'show']);
Route::put('/clients/{id}', [ClientsController::class, 'update']);
Route::delete('/clients/{id}', [ClientsController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/members', function () {
    return view('members');
})->name('members');

Route::get('/classes', function () {
    return view('classes');
})->name('classes');

Route::get('/memberships', function () {
    return view('memberships');
})->name('memberships');

Route::get('/instructors', function () {
    return view('instructors');
})->name('instructors');

Route::get('/home', function () {
    return view('home');
})->name('home');