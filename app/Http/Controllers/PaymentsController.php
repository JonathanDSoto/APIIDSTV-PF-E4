<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return $payments;
        // return view('payments.index', ['payments' => $payments]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'date' => 'required|date',
            'id_rates' => 'required|integer',
            'id_clients' => 'required|integer',
        ]);

        $payment = new Payment;
        $payment->id = $request->id;
        $payment->date = $request->date;
        $payment->id_rates = $request->id_rates;
        $payment->id_clients = $request->id_clients;
        $payment->save();

        return redirect('/payments');
    }

    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);
        return $payment;
        // return view('payments.show', ['payment' => $payment]);
    }

    // Obtiene el cliente de un pago
    public function client(string $id)
    {
        $payment = Payment::findOrFail($id);
        $client = $payment->client;
        return $client;
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'date' => 'required|date',
            'id_rates' => 'required|integer',
            'id_clients' => 'required|integer',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->id = $request->id;
        $payment->date = $request->date;
        $payment->id_rates = $request->id_rates;
        $payment->id_clients = $request->id_clients;
        $payment->save();

        return redirect('/payments');
    }

    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect('/payments');
    }
}