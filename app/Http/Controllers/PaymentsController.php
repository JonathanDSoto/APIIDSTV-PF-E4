<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\User;

class PaymentsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $payments = Payment::all();
        $memberships = Membership::all();
        return view('payments', ['users' => $users, 'payments' => $payments, 'memberships' => $memberships]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'memberships_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $payment = new Payment;
        $payment->memberships_id = $request->memberships_id;
        $payment->user_id = $request->user_id;
        $payment->date = now();
        $payment->save();

        return redirect('/payments');
    }

    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);
        return $payment;
        // return view('payments.show', ['payment' => $payment]);
    }

    public function paymentsByUser(string $user_Id)
    {
        $payments = Payment::where('user_id', $user_Id)->get();
        return $payments;
        // return view('payments.byUser', ['payments' => $payments]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'memberships_id' => 'required|integer',
            'user_id' => 'required|integer',
            'date' => 'required|date',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->memberships_id = $request->memberships_id;
        $payment->user_id = $request->user_id;
        $payment->date = $request->date;
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