<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr'])) {
        session()->put('locale', $lang);
    }
    return back();
})->name('locale.switch');

Route::get('/dashboard', function () {
    $stats = [
        'appointments' => \App\Models\Appointment::count(),
        'patients' => \App\Models\User::where('role', 'patient')->count(),
        'services' => \App\Models\Service::count(),
        'recent_appointments' => \App\Models\Appointment::with(['patient', 'service'])->latest()->take(5)->get(),
    ];
    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/appointments/search', [\App\Http\Controllers\AppointmentController::class, 'search'])->name('appointments.search');
    Route::resource('appointments', \App\Http\Controllers\AppointmentController::class);

    Route::resource('patients', \App\Http\Controllers\PatientController::class)->parameters(['patients' => 'patient']);
    Route::get('/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
});

require __DIR__.'/auth.php';
