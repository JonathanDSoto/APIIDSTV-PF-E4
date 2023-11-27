<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (!Str::startsWith($user->password, '$2y$')) {
                // Si la contraseña no está hasheada con Bcrypt, la hasheamos
                $user->password = Hash::make($credentials['password']);
                $user->save();
            }

            if (Hash::check($credentials['password'], $user->password)) {
                // Contraseña correcta, inicia sesión
                Auth::login($user);
                return redirect()->route('home'); // Reemplaza 'home' con la ruta a tu vista home
            }
        }

        // Autenticación fallida
        return redirect()->back()->withInput()->withErrors(['email' => 'Credenciales inválidas']);
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'lastname' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $user = new User();
    $user->name = $validatedData['name'];
    $user->lastname = $validatedData['lastname']; // Campo de apellido
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->save();

    return redirect()->route('login'); // Redirige a la vista de inicio de sesión
}
}
