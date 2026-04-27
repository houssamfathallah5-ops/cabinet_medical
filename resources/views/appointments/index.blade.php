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
                            <span class="ml-1 text-xs font-bold text-indigo-600 uppercase tracking-widest">{{ __('Appointments') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="text-4xl font-black text-slate-900 tracking-tight">
                {{ __('Appointments') }}
            </h2>
            <p class="mt-2 text-slate-500 font-medium">
                {{ __('Manage and monitor all medical consultations in real-time.') }}
            </p>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" id="searchInput" placeholder="{{ __('Search appointments...') }}" class="block w-72 pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-2xl leading-5 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all shadow-sm">
            </div>
            
            <button onclick="openAddModal()" class="inline-flex items-center px-6 py-3.5 medical-gradient border border-transparent rounded-2xl font-bold text-sm text-white shadow-lg shadow-indigo-200 hover:shadow-indigo-300 hover:-translate-y-0.5 transition-all focus:outline-none focus:ring-4 focus:ring-indigo-500/20">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                {{ __('New Appointment') }}
            </button>
        </div>
    </div>

    <div id="appointmentsTable" class="premium-card overflow-hidden">
        @include('appointments.partials.table')
    </div>

    <!-- Add Modal -->
    <x-modal name="add-appointment" :show="false" focusable>
        <form method="post" action="{{ route('appointments.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">{{ __('New Appointment') }}</h2>
            <div class="mt-6 space-y-4">
                <div>
                    <x-input-label for="patient_id" value="{{ __('Patient') }}" />
                    <select name="patient_id" id="patient_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="doctor_id" value="{{ __('Doctor') }}" />
                    <select name="doctor_id" id="doctor_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="service_id" value="{{ __('Service') }}" />
                    <select name="service_id" id="service_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->price }}€)</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="appointment_date" value="{{ __('Date') }}" />
                    <x-text-input id="appointment_date" name="appointment_date" type="datetime-local" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="notes" value="{{ __('Notes') }}" />
                    <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button class="ml-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Edit Modal -->
    <x-modal name="edit-appointment" :show="false" focusable>
        <form id="editForm" method="post" class="p-6">
            @csrf
            @method('patch')
            <h2 class="text-lg font-medium text-gray-900">{{ __('Edit Appointment') }}</h2>
            <div class="mt-6 space-y-4">
                <div>
                    <x-input-label for="edit_status" value="{{ __('Status') }}" />
                    <select name="status" id="edit_status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="pending">{{ __('Pending') }}</option>
                        <option value="confirmed">{{ __('Confirmed') }}</option>
                        <option value="cancelled">{{ __('Cancelled') }}</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="edit_date" value="{{ __('Date') }}" />
                    <x-text-input id="edit_date" name="appointment_date" type="datetime-local" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="edit_notes" value="{{ __('Notes') }}" />
                    <textarea name="notes" id="edit_notes" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button class="ml-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Delete Modal -->
    <x-modal name="confirm-appointment-deletion" :show="false" focusable>
        <form id="deleteForm" method="post" class="p-6">
            @csrf
            @method('delete')
            <h2 class="text-lg font-medium text-gray-900">{{ __('Delete Confirmation') }}</h2>
            <p class="mt-1 text-sm text-gray-600">{{ __('Once deleted, this appointment cannot be recovered.') }}</p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-danger-button class="ml-3">{{ __('Confirm') }}</x-danger-button>
            </div>
        </form>
    </x-modal>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function openAddModal() {
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'add-appointment' }));
        }

        function openEditModal(appointment) {
            const form = document.getElementById('editForm');
            form.action = `/appointments/${appointment.id}`;
            document.getElementById('edit_status').value = appointment.status;
            
            // Format date for datetime-local input
            const date = new Date(appointment.appointment_date);
            const formattedDate = date.toISOString().slice(0, 16);
            document.getElementById('edit_date').value = formattedDate;
            
            document.getElementById('edit_notes').value = appointment.notes || '';
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'edit-appointment' }));
        }

        function openDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            form.action = `/appointments/${id}`;
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-appointment-deletion' }));
        }

        // Search logic with Axios
        const searchInput = document.getElementById('searchInput');
        let timeout = null;

        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                const query = searchInput.value;
                axios.get(`{{ route('appointments.search') }}?query=${query}`)
                    .then(response => {
                        document.getElementById('appointmentsTable').innerHTML = response.data;
                    })
                    .catch(error => {
                        console.error('Error during search:', error);
                    });
            }, 300);
        });
    </script>
</x-app-layout>
