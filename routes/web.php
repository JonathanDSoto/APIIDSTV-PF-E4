<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\AssistancesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

/////////////////////////// User Routes ///////////////////////////
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'create']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::put('/users/{id}', [UsersController::class, 'update']);
Route::delete('/users/{id}', [UsersController::class, 'destroy']);

/////////////////////////// Payment Routes ///////////////////////////
Route::get('/payments', [PaymentsController::class, 'index']);
Route::post('/payments', [PaymentsController::class, 'create']);
// Route::get('/payments/{id}', [PaymentsController::class, 'show']);
// Obtén el cliente de un pago específico
Route::post('/payments/{id}', [PaymentsController::class, 'paymentsByUser']);
Route::put('/payments/{id}', [PaymentsController::class, 'update']);
Route::delete('/payments/{id}', [PaymentsController::class, 'destroy']);

/////////////////////////// Membership Routes ///////////////////////////
Route::get('/membership', [PaymentsController::class, 'index']);
Route::post('/payments', [PaymentsController::class, 'create']);
Route::get('/payments/{id}', [PaymentsController::class, 'show']);
// Obtén el cliente de un pago específico
Route::get('/payments/{id}/client', [PaymentsController::class, 'paymentsByUser']);
Route::put('/payments/{id}', [PaymentsController::class, 'update']);
Route::delete('/payments/{id}', [PaymentsController::class, 'destroy']);

Route::get('/', function () {
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

Route::get('/login', 'App\Http\Controllers\AuthController@loginPage');


//Login

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

//Register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

//Home 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search']);

