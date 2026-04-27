<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = \App\Models\Appointment::with(['patient', 'doctor', 'service'])->get();
        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
            'notes' => 'nullable|string',
        ]);

        $appointment = \App\Models\Appointment::create($validated);

        return response()->json([
            'message' => 'Appointment created successfully.',
            'data' => $appointment
        ], 201);
    }
}
