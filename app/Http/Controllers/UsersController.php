<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $showAll = $request->input('show_all');

        if ($showAll) {
            $users = User::withTrashed()->get();
        } else {
            $users = User::all();
        }

        return view('users', ['users' => $users]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:320|unique:users',
            'password' => 'required|max:64',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/users');
    }

    public function restore(string $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        $user->payments()->withTrashed()->restore();

        return redirect('/users');
    }

    public function enableAccount(string $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect('/users');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users', ['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:320|unique:users,email,' . $id,
            'password' => 'required|max:64',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/users');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->payments()->delete();
        $user->delete();

        return redirect('/users');
    }
}