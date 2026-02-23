<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Appointment;

class PaymentController extends Controller
{
    /**
     * Create payment intent (Stripe integration - stub for now)
     */
    public function createIntent(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric|min:1',
        ]);

        // TODO: Integrate with Stripe API later
        // For now, just create a payment record

        $payment = Payment::create([
            'appointment_id' => $request->appointment_id,
            'stripe_payment_intent_id' => 'pi_' . uniqid(),
            'amount' => $request->amount,
            'currency' => 'usd',
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment intent created (stub)',
            'client_secret' => 'dummy_secret_' . uniqid(),
            'payment' => $payment
        ], 200);
    }

    /**
     * Handle Stripe webhook (stub for now)
     */
    public function webhook(Request $request)
    {
        // TODO: Verify Stripe signature and handle events
        
        return response()->json([
            'success' => true,
            'message' => 'Webhook received'
        ], 200);
    }

    /**
     * Get payment history
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $payments = Payment::whereHas('appointment', function($query) use ($user) {
            $query->where('client_id', $user->id);
        })->with('appointment')->get();

        return response()->json([
            'success' => true,
            'payments' => $payments
        ], 200);
    }
}