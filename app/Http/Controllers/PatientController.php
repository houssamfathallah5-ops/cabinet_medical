<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = \App\Models\User::where('role', 'patient')->latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            'role' => 'patient',
        ]);

        return redirect()->route('patients.index')->with('success', __('Patient created successfully.'));
    }

    public function update(Request $request, \App\Models\User $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $patient->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', __('Patient updated successfully.'));
    }

    public function destroy(\App\Models\User $patient)
    {
        
        $patient->appointments()->delete();
        $patient->delete();

        return redirect()->route('patients.index')->with('success', __('Patient deleted successfully.'));
    }
}
