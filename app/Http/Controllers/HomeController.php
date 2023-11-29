<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();
    
        return view('home', ['users' => $users]);
    }
}

