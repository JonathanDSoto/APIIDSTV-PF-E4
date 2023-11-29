<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;

class AssistancesController extends Controller
{
    public function index()
    {
        $assistances = Assistance::all();
        return $assistances;
        // return view('assistances.index', ['assistances' => $assistances]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id_clients' => 'required|integer',
            'date' => 'required|date',
        ]);

        $assistance = new Assistance;
        $assistance->id_clients = $request->id_clients;
        $assistance->date = $request->date;
        $assistance->save();

        return redirect('/assistances');
    }

    public function show(string $id)
    {
        $assistance = Assistance::findOrFail($id);
        return $assistance;
        // return view('assistances.show', ['assistance' => $assistance]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_clients' => 'required|integer',
            'date' => 'required|date',
        ]);

        $assistance = Assistance::findOrFail($id);
        $assistance->id_clients = $request->id_clients;
        $assistance->date = $request->date;
        $assistance->save();

        return redirect('/assistances');
    }

    public function destroy(string $id)
    {
        $assistance = Assistance::findOrFail($id);
        $assistance->delete();

        return redirect('/assistances');
    }
}