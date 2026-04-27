<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ __('Management') }}</span>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-xs font-bold text-indigo-600 uppercase tracking-widest">{{ __('Patients') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="text-4xl font-black text-slate-900 tracking-tight">
                {{ __('Patients') }}
            </h2>
            <p class="mt-2 text-slate-500 font-medium">
                {{ __('Manage and monitor all registered patients in the cabinet.') }}
            </p>
        </div>
        
        <div class="flex items-center gap-4">
            <button onclick="openAddPatientModal()" class="inline-flex items-center px-6 py-3.5 medical-gradient border border-transparent rounded-2xl font-bold text-sm text-white shadow-lg shadow-indigo-200 hover:shadow-indigo-300 hover:-translate-y-0.5 transition-all focus:outline-none focus:ring-4 focus:ring-indigo-500/20">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                {{ __('New Patient') }}
            </button>
        </div>
    </div>

    <div class="premium-card overflow-hidden">
        <table class="min-w-full divide-y divide-slate-100">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Patient Name') }}</th>
                    <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Contact Info') }}</th>
                    <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Phone') }}</th>
                    <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Registered') }}</th>
                    <th class="px-8 py-5 text-right text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 bg-white">
                @forelse($patients as $patient)
                    <tr class="hover:bg-slate-50/80 transition-colors duration-200 group">
                        <td class="px-8 py-5 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-xl border-2 border-slate-50 shadow-sm" src="https://ui-avatars.com/api/?name={{ urlencode($patient->name) }}&background=6366f1&color=fff" alt="Avatar">
                                <span class="text-sm font-bold text-slate-700">{{ $patient->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap">
                            <span class="text-sm font-medium text-slate-600">{{ $patient->email }}</span>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap">
                            <span class="text-sm font-bold text-slate-500">{{ $patient->phone ?? '—' }}</span>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap">
                            <span class="text-sm font-medium text-slate-400">{{ $patient->created_at->format('d/m/Y') }}</span>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button onclick="openEditPatientModal({{ json_encode($patient) }})" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="{{ __('Edit') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <button onclick="openDeletePatientModal({{ $patient->id }})" class="p-2 text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="{{ __('Delete') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-300 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <span class="text-slate-400 font-bold">{{ __('No patients registered yet.') }}</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-8 py-5 bg-slate-50/50 border-t border-slate-100">
            {{ $patients->links() }}
        </div>
    </div>

    <!-- Add Patient Modal -->
    <x-modal name="add-patient" :show="false" focusable>
        <form method="post" action="{{ route('patients.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">{{ __('New Patient') }}</h2>
            <div class="mt-6 space-y-4">
                <div>
                    <x-input-label for="name" value="{{ __('Name') }}" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="email" value="{{ __('Email') }}" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="phone" value="{{ __('Phone') }}" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" />
                </div>
                <div>
                    <x-input-label for="password" value="{{ __('Password') }}" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button class="ml-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Edit Patient Modal -->
    <x-modal name="edit-patient" :show="false" focusable>
        <form id="editPatientForm" method="post" class="p-6">
            @csrf
            @method('patch')
            <h2 class="text-lg font-medium text-gray-900">{{ __('Edit Patient') }}</h2>
            <div class="mt-6 space-y-4">
                <div>
                    <x-input-label for="edit_name" value="{{ __('Name') }}" />
                    <x-text-input id="edit_name" name="name" type="text" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="edit_email" value="{{ __('Email') }}" />
                    <x-text-input id="edit_email" name="email" type="email" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="edit_phone" value="{{ __('Phone') }}" />
                    <x-text-input id="edit_phone" name="phone" type="text" class="mt-1 block w-full" />
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button class="ml-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Delete Patient Modal -->
    <x-modal name="confirm-patient-deletion" :show="false" focusable>
        <form id="deletePatientForm" method="post" class="p-6">
            @csrf
            @method('delete')
            <h2 class="text-lg font-medium text-gray-900">{{ __('Delete Confirmation') }}</h2>
            <p class="mt-1 text-sm text-gray-600">{{ __('Are you sure you want to delete this patient? All associated appointments will also be deleted.') }}</p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-danger-button class="ml-3">{{ __('Confirm') }}</x-danger-button>
            </div>
        </form>
    </x-modal>

    <script>
        function openAddPatientModal() {
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'add-patient' }));
        }

        function openEditPatientModal(patient) {
            const form = document.getElementById('editPatientForm');
            form.action = `/patients/${patient.id}`;
            document.getElementById('edit_name').value = patient.name;
            document.getElementById('edit_email').value = patient.email;
            document.getElementById('edit_phone').value = patient.phone || '';
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'edit-patient' }));
        }

        function openDeletePatientModal(id) {
            const form = document.getElementById('deletePatientForm');
            form.action = `/patients/${id}`;
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-patient-deletion' }));
        }
    </script>
</x-app-layout>
