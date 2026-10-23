<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aquário: catálogo de peixes e tipos para organizar seu projeto.">

    <title>@yield('title', 'Início') · {{ config('app.name', 'Aquário') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-slate-950 text-slate-100 antialiased selection:bg-cyan-400/30 selection:text-cyan-100">
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 left-1/2 h-[34rem] w-[34rem] -translate-x-1/2 rounded-full bg-cyan-500/20 blur-3xl"></div>
        <div class="absolute -bottom-24 right-0 h-96 w-96 translate-x-1/3 rounded-full bg-teal-400/10 blur-3xl"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(34,211,238,0.08),_transparent_45%)]"></div>
    </div>

    <header class="sticky top-0 z-40 border-b border-white/10 bg-slate-950/75 backdrop-blur-xl">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-cyan-400 to-teal-500 text-slate-950 shadow-lg shadow-cyan-500/25 transition group-hover:scale-105">
                    <x-fish-icon class="h-6 w-6" />
                </span>
                <span class="flex flex-col leading-tight">
                    <span class="text-sm font-semibold tracking-wide text-white">Aquário</span>
                    <span class="text-[10px] uppercase tracking-[0.25em] text-cyan-300/70">fish project</span>
                </span>
            </a>

            <nav class="hidden items-center gap-1 text-sm md:flex">
                <a href="{{ route('fishes.index') }}" class="rounded-full px-4 py-2 transition {{ request()->routeIs('fishes.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    Peixes
                </a>
                @auth
                    <a href="{{ route('types.index') }}" class="rounded-full px-4 py-2 transition {{ request()->routeIs('types.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        Tipos
                    </a>
                @endauth
            </nav>

            <div class="hidden items-center gap-3 md:flex">
                @auth
                    <div class="text-right leading-tight">
                        <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ auth()->user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-slate-200 transition hover:border-white/20 hover:bg-white/10 hover:text-white">
                            Sair
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="rounded-full px-4 py-2 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" class="rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-4 py-2 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                        Criar conta
                    </a>
                @endauth
            </div>

            <details class="relative md:hidden">
                <summary class="flex cursor-pointer list-none items-center justify-center rounded-xl border border-white/10 bg-white/5 p-2.5 text-slate-200 transition hover:bg-white/10">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                </summary>

                <div class="absolute right-0 mt-3 w-60 rounded-2xl border border-white/10 bg-slate-900/95 p-2 shadow-2xl shadow-black/40 backdrop-blur-xl">
                    <a href="{{ route('fishes.index') }}" class="block rounded-xl px-3 py-2.5 text-sm text-slate-200 transition hover:bg-white/5 hover:text-white">
                        Peixes
                    </a>
                    @auth
                        <a href="{{ route('types.index') }}" class="block rounded-xl px-3 py-2.5 text-sm text-slate-200 transition hover:bg-white/5 hover:text-white">
                            Tipos
                        </a>
                        <div class="my-2 border-t border-white/10"></div>
                        <p class="px-3 py-1 text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                        <p class="px-3 pb-2 text-xs text-slate-400">{{ auth()->user()->email }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full rounded-xl px-3 py-2.5 text-left text-sm text-rose-300 transition hover:bg-rose-500/10">
                                Sair
                            </button>
                        </form>
                    @else
                        <div class="my-2 border-t border-white/10"></div>
                        <a href="{{ route('login') }}" class="block rounded-xl px-3 py-2.5 text-sm text-slate-200 transition hover:bg-white/5 hover:text-white">
                            Entrar
                        </a>
                        <a href="{{ route('register') }}" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-cyan-300 transition hover:bg-cyan-400/10">
                            Criar conta
                        </a>
                    @endauth
                </div>
            </details>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-10 sm:px-6 lg:px-8">
        @if (session('status'))
            <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                <svg class="mt-0.5 h-5 w-5 shrink-0 text-emerald-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m5 12 4 4L19 6" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-white/5 py-8">
        <div class="mx-auto flex w-full max-w-6xl flex-col gap-3 px-4 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Aquário') }}. Projeto de estudo em Laravel.</p>
            <div class="flex items-center gap-4">
                <a href="{{ route('fishes.index') }}" class="transition hover:text-cyan-300">Catálogo</a>
                <a href="{{ route('login') }}" class="transition hover:text-cyan-300">Entrar</a>
            </div>
        </div>
    </footer>
</body>
</html>
