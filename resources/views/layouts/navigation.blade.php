<nav x-data="{ open: false }" class="border-none bg-transparent">
    <!-- Primary Navigation Menu -->
    <div class="max-w-[1600px] mx-auto px-6 lg:px-10">
        <div class="flex justify-between h-20 items-center">
            <!-- Left side (Mobile Logo) -->
            <div class="flex items-center lg:hidden gap-3">
                <div class="w-10 h-10 medical-gradient rounded-xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                </div>
                <span class="text-lg font-black tracking-tight text-slate-800 uppercase">{{ config('app.name', 'Cabinet') }}</span>
            </div>

            <div class="flex-1"></div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                <div class="flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-xl text-indigo-600">
                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                    <span class="text-xs font-black uppercase tracking-widest">{{ __('Live Status') }}</span>
                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 p-1.5 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none">
                            <img class="w-8 h-8 rounded-xl border border-slate-50" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=f8fafc&color=6366f1" alt="Avatar">
                            <div class="px-1 pr-2">
                                <svg class="fill-current h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-slate-50">
                            <span class="block text-sm font-black text-slate-800">{{ Auth::user()->name }}</span>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">{{ Auth::user()->email }}</span>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="text-sm font-bold text-slate-600 py-3 hover:bg-slate-50">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                {{ __('Profile Settings') }}
                            </div>
                        </x-dropdown-link>

                        <div class="px-4 py-2 text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50/50">
                            {{ __('Language') }}
                        </div>
                        <x-dropdown-link :href="route('locale.switch', 'fr')" class="text-sm font-bold text-slate-600 py-2.5 hover:bg-slate-50">
                            🇫🇷 Français
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('locale.switch', 'en')" class="text-sm font-bold text-slate-600 py-2.5 hover:bg-slate-50">
                            🇺🇸 English
                        </x-dropdown-link>

                        <div class="border-t border-slate-50"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="text-sm font-bold text-rose-600 py-3 hover:bg-rose-50">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    {{ __('Log Out') }}
                                </div>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2.5 rounded-xl text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-slate-100 shadow-xl overflow-hidden rounded-b-3xl">
        <div class="pt-4 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl font-bold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.*')" class="rounded-xl font-bold">
                {{ __('Appointments') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('patients.index')" :active="request()->routeIs('patients.*')" class="rounded-xl font-bold">
                {{ __('Patients') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('email.create')" :active="request()->routeIs('email.*')" class="rounded-xl font-bold">
                {{ __('Email') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-6 pb-6 border-t border-slate-50 bg-slate-50/50 px-8">
            <div class="flex items-center gap-4 mb-6">
                <img class="w-12 h-12 rounded-xl border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff" alt="Avatar">
                <div>
                    <div class="font-black text-base text-slate-800">{{ Auth::user()->name }}</div>
                    <div class="font-bold text-xs text-slate-400 uppercase tracking-tight">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl font-bold">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="rounded-xl font-bold text-rose-600 bg-rose-50 border-none">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
