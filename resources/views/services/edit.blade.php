<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('services.index') }}" class="text-xs font-bold text-slate-400 hover:text-indigo-600 uppercase tracking-widest transition-colors">{{ __('Medical Services') }}</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-xs font-bold text-indigo-600 uppercase tracking-widest">{{ __('Edit') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="text-4xl font-black text-slate-900 tracking-tight">
                {{ __('Edit Service') }}
            </h2>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-slate-200 text-slate-700 text-sm font-bold rounded-2xl hover:bg-slate-50 transition-all shadow-sm">
                {{ __('Cancel') }}
            </a>
        </div>
    </div>

    <div class="premium-card p-10 bg-white rounded-3xl shadow-sm border border-slate-100">
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="col-span-full md:col-span-1">
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2">{{ __('Service Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" class="w-full rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-full md:col-span-1">
                    <label for="price" class="block text-sm font-bold text-slate-700 mb-2">{{ __('Price (€)') }}</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $service->price) }}" class="w-full rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                    @error('price') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-full md:col-span-1">
                    <label for="duration" class="block text-sm font-bold text-slate-700 mb-2">{{ __('Duration (minutes)') }}</label>
                    <input type="number" name="duration" id="duration" value="{{ old('duration', $service->duration) }}" class="w-full rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                    @error('duration') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-full">
                    <label for="description" class="block text-sm font-bold text-slate-700 mb-2">{{ __('Description') }}</label>
                    <textarea name="description" id="description" rows="4" class="w-full rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>{{ old('description', $service->description) }}</textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 px-8 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-200 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ __('Update Service') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
