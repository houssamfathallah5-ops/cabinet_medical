<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Medical Cabinet') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        <style>
            .medical-gradient {
                background: linear-gradient(135deg, #3b82f6 0%, #2dd4bf 100%);
            }
            .text-gradient {
                background: linear-gradient(135deg, #2563eb 0%, #0d9488 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .premium-card {
                background: white;
                border-radius: 1rem;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            }
            .btn-premium {
                padding: 0.625rem 1.25rem;
                border-radius: 0.75rem;
                font-weight: 600;
                transition: all 0.2s;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-full -z-10 bg-[#f8fafc]">
                <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-100/50 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-teal-50/50 rounded-full blur-[120px]"></div>
            </div>

            
            <nav class="max-w-7xl mx-auto px-6 py-8 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 medical-gradient rounded-xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">{{ config('app.name', 'Cabinet Medical') }}</span>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-premium bg-blue-600 text-white hover:bg-blue-700">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-premium bg-white text-slate-900 border border-slate-200 hover:bg-slate-50">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

            
            <main class="max-w-7xl mx-auto px-6 pt-16 pb-24">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="inline-block px-4 py-1.5 rounded-full bg-blue-50 text-blue-600 text-sm font-bold tracking-wide uppercase mb-6 shadow-sm">
                            ✨ {{ __('Professional Healthcare') }}
                        </span>
                        <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 leading-[1.1] mb-8">
                            {{ __('Managing your') }} <span class="text-gradient">{{ __('health') }}</span> {{ __('is now easier than ever.') }}
                        </h1>
                        <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-lg">
                            {{ __('Schedule your medical appointments in a few clicks. Fast, secure, and available 24/7 for your peace of mind.') }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('register') }}" class="btn-premium bg-blue-600 text-white text-center py-4 px-8 text-lg hover:bg-blue-700 shadow-xl shadow-blue-200">
                                {{ __('Get Started Now') }}
                            </a>
                            <div class="flex items-center gap-4 px-4 py-2 border border-slate-200 rounded-xl bg-white/50 backdrop-blur-sm">
                                <div class="flex -space-x-2">
                                    <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dr+John&background=random" alt="Doctor">
                                    <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dr+Jane&background=random" alt="Doctor">
                                    <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dr+Smith&background=random" alt="Doctor">
                                </div>
                                <div class="text-xs">
                                    <span class="block font-bold text-slate-900">10+ {{ __('Experts') }}</span>
                                    <span class="text-slate-500">{{ __('Ready to help you') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="premium-card p-4 rotate-3 lg:rotate-6 scale-95 opacity-50 absolute inset-0 -z-10 translate-x-12 translate-y-12"></div>
                        <div class="premium-card p-8 bg-white shadow-2xl relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 medical-gradient opacity-10 rounded-bl-[100px]"></div>
                            
                            <div class="flex items-center justify-between mb-10">
                                <h3 class="text-xl font-bold text-slate-900">{{ __('Quick View') }}</h3>
                                <span class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                </span>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-center gap-4 p-4 rounded-2xl bg-blue-50 border border-blue-100">
                                    <div class="w-12 h-12 rounded-xl bg-blue-500 flex items-center justify-center text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="block text-xs font-bold text-blue-400 uppercase tracking-wider">{{ __('Cardiology') }}</span>
                                        <span class="block text-slate-900 font-bold">{{ __('Tomorrow, 10:00 AM') }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-4 rounded-2xl border border-slate-100">
                                    <div class="w-12 h-12 rounded-xl bg-teal-500 flex items-center justify-center text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('General Consultation') }}</span>
                                        <span class="block text-slate-900 font-bold">{{ __('Wed, 26 April') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 pt-8 border-t border-slate-100 flex items-center justify-between">
                                <div class="flex -space-x-3">
                                    @for($i=0; $i<4; $i++)
                                        <div class="w-10 h-10 rounded-full border-4 border-white bg-slate-200"></div>
                                    @endfor
                                </div>
                                <span class="text-sm font-bold text-slate-400">{{ __('+24 this week') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            
            <footer class="max-w-7xl mx-auto px-6 py-12 border-t border-slate-200">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <p class="text-slate-500 text-sm">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Medical Cabinet') }}. {{ __('All rights reserved.') }}
                    </p>
                    <div class="flex items-center gap-8">
                        <a href="{{ route('locale.switch', 'fr') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600">🇫🇷 Français</a>
                        <a href="{{ route('locale.switch', 'en') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600">🇺🇸 English</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
