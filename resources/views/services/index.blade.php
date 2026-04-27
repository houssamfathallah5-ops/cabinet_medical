<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ __('Catalogue') }}</span>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-xs font-bold text-indigo-600 uppercase tracking-widest">{{ __('Medical Services') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="text-4xl font-black text-slate-900 tracking-tight">
                {{ __('Medical Services') }}
            </h2>
            <p class="mt-2 text-slate-500 font-medium">
                {{ __('Explore the full range of specialized medical care provided by our cabinet.') }}
            </p>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('services.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-200 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                {{ __('Add Service') }}
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($services as $service)
            <div class="premium-card p-10 flex flex-col relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 medical-gradient opacity-[0.03] rounded-bl-full group-hover:opacity-[0.08] transition-opacity"></div>
                
                <div class="mb-6">
                    <div class="flex justify-between items-start">
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </span>
                        <div class="flex items-center gap-2 relative z-10">
                            <a href="{{ route('services.edit', $service) }}" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('Are you sure you want to delete this service?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors">{{ $service->name }}</h3>
                    <p class="text-slate-500 font-medium leading-relaxed line-clamp-3">{{ $service->description }}</p>
                </div>
                
                <div class="mt-auto pt-8 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ __('Starting from') }}</span>
                        <span class="text-3xl font-black text-indigo-600">{{ number_format($service->price, 2) }} €</span>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="flex items-center gap-1.5 px-4 py-2 rounded-xl bg-slate-50 text-[11px] font-black text-slate-500 uppercase tracking-wider border border-slate-100 group-hover:bg-indigo-50 group-hover:text-indigo-600 group-hover:border-indigo-100 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $service->duration }} min
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full premium-card p-20 text-center flex flex-col items-center">
                <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center text-slate-300 mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-slate-900 mb-2">{{ __('No services available.') }}</h4>
                <p class="text-slate-400 font-medium">{{ __('Please check back later or contact the administrator.') }}</p>
            </div>
        @endforelse
    </div>
    
    <div class="mt-12">
        {{ $services->links() }}
    </div>
</x-app-layout>
