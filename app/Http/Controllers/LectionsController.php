<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lection;
use App\Models\User;
use App\Models\Instructor;

class LectionsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $lections = Lection::all();
        $instructors = Instructor::all();
        return view('lections', ['users' => $users, 'lections' => $lections, 'instructors' => $instructors]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'instructor_id' => 'required|integer',
            'date' => 'required|date',
            'schedule' => 'required|date_format:H:i',
        ]);        

        $lection = new Lection;
        $lection->user_id = $request->user_id;
        $lection->instructor_id = $request->instructor_id;
        $lection->assistance = false;
        $lection->date = $request->date;
        $lection->schedule = $request->schedule;
        $lection->save();

        return redirect('/lections');
    }

    public function show(string $id)
    {
        $lection = Lection::findOrFail($id);
        return $lection;
    }

    public function lectionsByUser(string $user_id)
    {
        $users = User::findOrFail($user_id);
        $lections = Lection::where('user_id', $user_id)->get();
        $instructors = Instructor::all();
        return view('lections', ['users' => $users, 'lections' => $lections, 'instructors' => $instructors]);
    }

    public function registerAssistance(string $id)
    {
        $lection = Lection::findOrFail($id);
        $lection->assistance = !$lection->assistance;
        $lection->save();

        return redirect('/lections');
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'instructor_id' => 'required|integer',
            'date' => 'required|date',
            'schedule' => 'required|date_format:H:i',
        ]);        

        $lection = Lection::findOrFail($id);
        $lection->user_id = $request->user_id;
        $lection->instructor_id = $request->instructor_id;
        $lection->assistance = !$lection->assistance;
        $lection->date = $request->date;
        $lection->schedule = $request->schedule;
        $lection->save();

        return redirect('/lections');
    }

    public function destroy(string $id)
    {
        $lection = Lection::findOrFail($id);
        $lection->delete();

        return redirect('/lections');
    }
}