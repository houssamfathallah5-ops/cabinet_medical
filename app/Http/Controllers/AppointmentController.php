<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    
    public function index(Request $request)
    {
        $appointments = \App\Models\Appointment::with(['patient', 'doctor', 'service'])
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        if ($request->ajax()) {
            return view('appointments.partials.table', compact('appointments'))->render();
        }

        $patients = \App\Models\User::where('role', 'patient')->get();
        $doctors = \App\Models\User::where('role', 'doctor')->get();
        $services = \App\Models\Service::all();

        return view('appointments.index', compact('appointments', 'patients', 'doctors', 'services'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $appointments = \App\Models\Appointment::with(['patient', 'doctor', 'service'])
            ->whereHas('patient', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('service', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('appointments.partials.table', compact('appointments'))->render();
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

        \Illuminate\Support\Facades\Mail::to($appointment->patient->email)->send(new \App\Mail\AppointmentConfirmed($appointment));

        return redirect()->route('appointments.index')->with('success', __('Appointment created successfully.'));
    }

    public function update(Request $request, \App\Models\Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', __('Appointment updated successfully.'));
    }

    public function destroy(\App\Models\Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', __('Appointment deleted successfully.'));
    }
}
