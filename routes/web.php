<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MembershipsController;
use App\Http\Controllers\PaymentsController;

/////////////////////////// User Routes ///////////////////////////
Route::get('/users', [UsersController::class, 'index']); // Obtiene todos los usuarios
Route::get('/users/create', [UsersController::class, 'create']); // Redirige a la view del formulario
Route::post('/users', [UsersController::class, 'store']); // Recibe los parámetros del usuario para crearlo
Route::get('/users/{id}', [UsersController::class, 'show']); // Obtiene un usuario por su id
Route::get('/users/{id}/edit', [UsersController::class, 'edit']); // Redirige a la view del formulario
Route::put('/users/{id}', [UsersController::class, 'update']); // Recibe los parámetros del usuario para actualizarlos
Route::delete('/users/{id}', [UsersController::class, 'destroy']); // Elimina a un usuario por si id

/////////////////////////// Memberships Routes ///////////////////////////
Route::get('/memberships', [MembershipsController::class, 'index']);
Route::get('/memberships/create', [MembershipsController::class, 'create']);
Route::post('/memberships', [MembershipsController::class, 'store']);
Route::get('/memberships/{id}', [MembershipsController::class, 'show']);
Route::get('/memberships/{id}/edit', [MembershipsController::class, 'edit']);
Route::put('/memberships/{id}', [MembershipsController::class, 'update']);
Route::delete('/memberships/{id}', [MembershipsController::class, 'destroy']);

/////////////////////////// Payments Routes ///////////////////////////
Route::get('/payments', [PaymentsController::class, 'index']);
Route::get('/payments/create', [PaymentsController::class, 'create']);
Route::post('/payments', [PaymentsController::class, 'store']);
Route::get('/payments/{payment}', [PaymentsController::class, 'show']);
// Busca todos los pagos de unn usuario
Route::get('/payments/{user}/user', [PaymentsController::class, 'paymentsByUser']);
Route::get('/payments/{payment}/edit', [PaymentsController::class, 'edit']);
Route::put('/payments/{payment}', [PaymentsController::class, 'update']);
Route::delete('/payments/{payment}', [PaymentsController::class, 'destroy']);

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

//Route::get('/login', 'App\Http\Controllers\AuthController@loginPage');


//login

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


//register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
