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
Route::post('/users/create', [UsersController::class, 'create']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::get('/users/{id}/client', [UsersController::class, 'client']);
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
// Obtén todos los pagos de un cliente específico
Route::get('/clients/{id}/payments', [ClientsController::class, 'payments']);
Route::put('/clients/{id}', [ClientsController::class, 'update']);
Route::delete('/clients/{id}', [ClientsController::class, 'destroy']);

/////////////////////////// Payment Routes ///////////////////////////
Route::get('/payments', [PaymentsController::class, 'index']);
Route::post('/payments/create', [PaymentsController::class, 'create']);
Route::get('/payments/{id}', [PaymentsController::class, 'show']);
// Obtén el cliente de un pago específico
Route::get('/payments/{id}/client', [PaymentsController::class, 'client']);
Route::put('/payments/{id}', [PaymentsController::class, 'update']);
Route::delete('/payments/{id}', [PaymentsController::class, 'destroy']);

/////////////////////////// Assistance Routes ///////////////////////////
Route::get('/assistances', [AssistancesController::class, 'index']);
Route::post('/assistances/create', [AssistancesController::class, 'create']);
Route::get('/assistances/{id}', [AssistancesController::class, 'show']);
Route::put('/assistances/{id}', [AssistancesController::class, 'update']);
Route::delete('/assistances/{id}', [AssistancesController::class, 'destroy']);

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

Route::get('/home', function () {
    return view('home');
})->name('home');

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

