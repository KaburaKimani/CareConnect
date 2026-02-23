<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Caregiver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Get user's appointments
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'client') {
            $appointments = Appointment::where('client_id', $user->id)
                ->with(['caregiver:id,name,email,phone'])
                ->orderBy('scheduled_at', 'desc')
                ->get();
        } elseif ($user->role === 'caregiver') {
            $appointments = Appointment::where('caregiver_id', $user->id)
                ->with(['client:id,name,email,phone'])
                ->orderBy('scheduled_at', 'desc')
                ->get();
        } else {
            // Admin sees all appointments
            $appointments = Appointment::with([
                    'client:id,name,email',
                    'caregiver:id,name,email'
                ])
                ->orderBy('scheduled_at', 'desc')
                ->get();
        }

        return response()->json([
            'success' => true,
            'count' => $appointments->count(),
            'appointments' => $appointments
        ], 200);
    }

    /**
     * Create new appointment
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'caregiver_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date|after:now',
            'duration_hours' => 'required|integer|min:1|max:24',
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify caregiver profile exists
        $caregiverProfile = Caregiver::where('user_id', $request->caregiver_id)->first();

        if (!$caregiverProfile) {
            return response()->json([
                'success' => false,
                'message' => 'Selected user is not a caregiver'
            ], 400);
        }

        $appointment = Appointment::create([
            'client_id' => $request->user()->id,
            'caregiver_id' => $request->caregiver_id,
            'scheduled_at' => $request->scheduled_at,
            'duration_hours' => $request->duration_hours,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        // Load relationships properly
        $appointment->load([
            'client:id,name,email',
            'caregiver:id,name,email'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment created successfully',
            'appointment' => $appointment
        ], 201);
    }

    /**
     * Get single appointment
     */
    public function show(Request $request, $id)
    {
        $appointment = Appointment::with([
                'client:id,name,email,phone',
                'caregiver:id,name,email,phone'
            ])
            ->find($id);

        if (!$appointment) {
            return response()->json([
                'success' => false,
                'message' => 'Appointment not found'
            ], 404);
        }

        $user = $request->user();

        if (
            $user->role !== 'admin' &&
            $appointment->client_id !== $user->id &&
            $appointment->caregiver_id !== $user->id
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'appointment' => $appointment
        ], 200);
    }

    /**
     * Update appointment status
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json([
                'success' => false,
                'message' => 'Appointment not found'
            ], 404);
        }

        $user = $request->user();

        if (
            $user->role !== 'admin' &&
            $appointment->client_id !== $user->id &&
            $appointment->caregiver_id !== $user->id
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $appointment->update([
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment status updated',
            'appointment' => $appointment
        ], 200);
    }

    /**
     * Delete appointment
     */
    public function destroy(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json([
                'success' => false,
                'message' => 'Appointment not found'
            ], 404);
        }

        $user = $request->user();

        if ($user->role !== 'admin' && $appointment->client_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only clients can cancel appointments'
            ], 403);
        }

        $appointment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Appointment cancelled successfully'
        ], 200);
    }
}