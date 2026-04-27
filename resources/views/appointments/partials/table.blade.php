<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-slate-100">
        <thead>
            <tr class="bg-slate-50/50">
                <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Date & Time') }}</th>
                <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Patient') }}</th>
                <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Service') }}</th>
                <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Doctor') }}</th>
                <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Status') }}</th>
                <th class="px-8 py-5 text-right text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50 bg-white">
            @forelse($appointments as $appointment)
                <tr class="hover:bg-slate-50/80 transition-colors duration-200 group">
                    <td class="px-8 py-5 whitespace-nowrap">
                        <div class="flex flex-col">
                            <span class="text-sm font-bold text-slate-900">{{ $appointment->appointment_date->format('d M, Y') }}</span>
                            <span class="text-xs font-medium text-slate-400">{{ $appointment->appointment_date->format('H:i') }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img class="w-9 h-9 rounded-xl border-2 border-slate-50 shadow-sm" src="https://ui-avatars.com/api/?name={{ urlencode($appointment->patient->name) }}&background=f1f5f9&color=64748b" alt="Avatar">
                            <span class="text-sm font-bold text-slate-700">{{ $appointment->patient->name }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap">
                        <span class="px-3 py-1.5 rounded-xl medical-gradient text-white text-[10px] font-black uppercase tracking-wider shadow-sm shadow-indigo-100">
                            {{ $appointment->service->name }}
                        </span>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
                            <span class="text-sm font-semibold text-slate-600">{{ $appointment->doctor->name }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap">
                        @php
                            $statusConfig = [
                                'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'dot' => 'bg-amber-400'],
                                'confirmed' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'dot' => 'bg-emerald-400'],
                                'cancelled' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-600', 'dot' => 'bg-rose-400'],
                            ];
                            $cfg = $statusConfig[$appointment->status] ?? ['bg' => 'bg-slate-50', 'text' => 'text-slate-600', 'dot' => 'bg-slate-400'];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl {{ $cfg['bg'] }} {{ $cfg['text'] }} text-[10px] font-black uppercase tracking-wider">
                            <span class="w-1.5 h-1.5 rounded-full {{ $cfg['dot'] }}"></span>
                            {{ __(ucfirst($appointment->status)) }}
                        </span>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap text-right">
                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button onclick="openEditModal({{ json_encode($appointment) }})" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="{{ __('Edit') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button onclick="openDeleteModal({{ $appointment->id }})" class="p-2 text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="{{ __('Delete') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-300 mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="text-slate-400 font-bold">{{ __('No appointments found matching your criteria.') }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if(method_exists($appointments, 'links'))
    <div class="px-8 py-5 bg-slate-50/50 border-t border-slate-100">
        {{ $appointments->links() }}
    </div>
@endif
