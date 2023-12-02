<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors', ['instructors' => $instructors]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
        ]);

        $instructor = new Instructor;
        $instructor->name = $request->name;
        $instructor->last_name = $request->last_name;
        $instructor->save();

        return redirect('/instructors');
    }

    public function show(string $id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('instructors', ['instructor' => $instructor]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
        ]);

        $instructor = Instructor::findOrFail($id);
        $instructor->name = $request->name;
        $instructor->last_name = $request->last_name;
        $instructor->save();

        return redirect('/instructors');
    }

    public function destroy(string $id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return redirect('/instructors');
    }
}