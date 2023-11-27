<?php
//Apartado de funcionaliad de la autenticacion
namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //

    public function show(){
        if(Auth::check()){
            return redirect('auth.login');
        }
        return view('login');
    }

    public function login(loginRequest $request){
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect()->to('/')->withErrors('auth.failed');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request,$user);
    }

    public function authenticated(Request $request,$user){
        return redirect('/home');
    }
}
