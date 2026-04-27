<x-app-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight uppercase">
            {{ __('Envoyer un Email') }}
        </h2>
    </div>

    <div class="premium-card p-8">
        @if(session('success'))
            <div class="mb-4 bg-emerald-50 text-emerald-600 p-4 rounded-xl border border-emerald-100 font-bold">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 bg-red-50 text-red-600 p-4 rounded-xl border border-red-100 font-bold">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('email.send') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Destinataire (Email)') }}</label>
                <input type="email" name="email" id="email" class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>
            
            <div>
                <label for="subject" class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Sujet') }}</label>
                <input type="text" name="subject" id="subject" class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="message" class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Message') }}</label>
                <textarea name="message" id="message" rows="6" class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white font-bold px-6 py-3 rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    {{ __('Envoyer') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
