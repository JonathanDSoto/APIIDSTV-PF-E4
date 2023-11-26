<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return $clients;
        // return view('clients.index', ['clients' => $clients]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'roll' => 'required|integer',
            'id_rates' => 'required|integer',
        ]);

        $client = new Client;
        $client->id = $request->id;
        $client->roll = $request->roll;
        $client->id_rates = $request->id_rates;
        $client->save();

        return redirect('/clients');
    }

    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return $client;
        // return view('clients.show', ['client' => $client]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'roll' => 'required|integer',
            'id_rates' => 'required|integer',
        ]);

        $client = Client::findOrFail($id);
        $client->id = $request->id;
        $client->roll = $request->roll;
        $client->id_rates = $request->id_rates;
        $client->save();

        return redirect('/clients');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect('/clients');
    }
}