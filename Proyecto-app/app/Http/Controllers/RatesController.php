<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RatesController extends Controller
{
    public function index()
    {
        $rates = Rate::all();
        return $rates;
        // return view('rates.index', ['rates' => $rates]);
    }

    public function create()
    {
        return view('rates.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:46',
            'price' => 'required|numeric',
            'time' => 'required|integer',
        ]);

        $rate = new Rate;
        $rate->name = $request->name;
        $rate->price = $request->price;
        $rate->time = $request->time;
        $rate->save();

        return redirect('/rates');
    }

    public function show(string $id)
    {
        $rate = Rate::findOrFail($id);
        return $rate;
        // return view('rates.index', ['rate' => $rate]);
    }

    public function edit(string $id)
    {
        $rate = Rate::findOrFail($id);
        return view('rates.edit', ['rate' => $rate]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:46',
            'price' => 'required|numeric',
            'time' => 'required|integer',
        ]);

        $rate = Rate::findOrFail($id);
        $rate->name = $request->name;
        $rate->price = $request->price;
        $rate->time = $request->time;
        $rate->save();

        return redirect('/rates');
    }

    public function destroy(string $id)
    {
        $rate = Rate::findOrFail($id);
        $rate->delete();

        return redirect('/rates');
    }
}