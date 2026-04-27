<x-app-layout>
    <div class="mb-12">
        <h2 class="text-4xl font-black text-slate-900 tracking-tight">
            {{ __('Dashboard') }}
        </h2>
        <p class="mt-2 text-slate-500 font-medium">
            {{ __('Welcome back,') }} <span class="text-indigo-600 font-bold">{{ Auth::user()->name }}</span>. {{ __('Your medical activity for today.') }}
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="premium-card p-8 group">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <span class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-1">{{ __('Total Appointments') }}</span>
                    <span class="text-3xl font-black text-slate-900">{{ $stats['appointments'] }}</span>
                </div>
            </div>
        </div>

        <div class="premium-card p-8 group">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <span class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-1">{{ __('Total Patients') }}</span>
                    <span class="text-3xl font-black text-slate-900">{{ $stats['patients'] }}</span>
                </div>
            </div>
        </div>

        <div class="premium-card p-8 group">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <div>
                    <span class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-1">{{ __('Available Services') }}</span>
                    <span class="text-3xl font-black text-slate-900">{{ $stats['services'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Recent Appointments -->
        <div class="xl:col-span-2 premium-card p-10">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">{{ __('Recent Appointments') }}</h3>
                <a href="{{ route('appointments.index') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-700 bg-indigo-50 px-4 py-2 rounded-xl transition-all">
                    {{ __('View All') }}
                </a>
            </div>
            <div class="space-y-4">
                @foreach($stats['recent_appointments'] as $apt)
                    <div class="flex items-center justify-between p-5 rounded-2xl bg-white border border-slate-100 hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-50/50 transition-all group">
                        <div class="flex items-center gap-4">
                            <img class="w-12 h-12 rounded-xl border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name={{ urlencode($apt->patient->name) }}&background=f8fafc&color=6366f1" alt="Patient">
                            <div>
                                <span class="block text-base font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $apt->patient->name }}</span>
                                <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $apt->service->name }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="text-sm font-black text-slate-900">{{ $apt->appointment_date->format('H:i') }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">{{ $apt->appointment_date->format('d M') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="premium-card p-10 medical-gradient text-white border-none relative overflow-hidden flex flex-col">
            <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-indigo-900/10 rounded-full blur-3xl"></div>
            
            <h3 class="text-xl font-black mb-8 relative z-10 uppercase tracking-tight">{{ __('Quick Actions') }}</h3>
            <div class="flex-1 space-y-4 relative z-10">
                <a href="{{ route('appointments.index') }}" class="flex items-center gap-4 p-5 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 hover:-translate-y-1 transition-all">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="text-sm font-bold">{{ __('New Appointment') }}</span>
                </a>
                <a href="{{ route('patients.index') }}" class="flex items-center gap-4 p-5 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 hover:-translate-y-1 transition-all">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    <span class="text-sm font-bold">{{ __('Register Patient') }}</span>
                </a>
            </div>
            
            <div class="mt-8 p-6 rounded-2xl bg-indigo-900/20 border border-white/10 relative z-10">
                <p class="text-xs font-bold text-indigo-100 uppercase tracking-widest mb-2">{{ __('Tip of the day') }}</p>
                <p class="text-sm font-medium text-white/90 leading-relaxed italic">
                    "Ensure all patient history is updated before confirming new consultations."
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
