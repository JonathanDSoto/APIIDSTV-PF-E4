<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lection;

class LectionsController extends Controller
{
    public function index()
    {
        $lections = Lection::all();
        return view('lections', compact('lections'));
    }

    public function create(Request $request)
    {
        $lection = new Lection;
        $lection->fill($request->all());
        $lection->save();

        return redirect()->route('lections');
    }

    public function show(Lection $lection)
    {
        return view('lections', compact('lection'));
    }

    public function update(Request $request, Lection $lection)
    {
        $lection->fill($request->all());
        $lection->save();

        return redirect()->route('lections');
    }

    public function destroy(Lection $lection)
    {
        $lection->delete();
        return redirect()->route('lections');
    }
}