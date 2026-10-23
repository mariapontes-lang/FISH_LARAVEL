@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <div class="space-y-16 py-4 lg:py-8">
        <section class="grid items-center gap-10 lg:grid-cols-[1.05fr_0.95fr]">
            <div>
                <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1 text-xs font-medium text-cyan-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-cyan-300"></span>
                    Organize seu aquário
                </span>

                <h1 class="mt-6 text-4xl font-semibold leading-tight tracking-tight text-white sm:text-5xl">
                    Seu aquário,
                    <span class="bg-gradient-to-r from-cyan-300 via-teal-300 to-emerald-300 bg-clip-text text-transparent">organizado</span>.
                </h1>

                <p class="mt-5 max-w-xl text-base leading-7 text-slate-300">
                    Cadastre peixes, classifique por tipo e mantenha todas as informações do seu aquário em um só lugar, com uma interface simples e agradável.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('fishes.index') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-6 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                        Explorar catálogo
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>

                    <a href="{{ auth()->check() ? route('fishes.create') : route('register') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:border-white/20 hover:bg-white/10">
                        {{ auth()->check() ? 'Cadastrar peixe' : 'Criar conta grátis' }}
                    </a>
                </div>

                <ul class="mt-8 grid gap-3 text-sm text-slate-300 sm:grid-cols-3">
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-cyan-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m5 12 4 4L19 6" />
                        </svg>
                        Catálogo visual
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-cyan-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m5 12 4 4L19 6" />
                        </svg>
                        Tipos organizados
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-cyan-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m5 12 4 4L19 6" />
                        </svg>
                        Gestão rápida
                    </li>
                </ul>
            </div>

            <div class="relative mx-auto w-full max-w-md lg:max-w-none">
                <div class="absolute -inset-6 rounded-[2.5rem] bg-gradient-to-br from-cyan-400/20 via-transparent to-teal-400/10 blur-2xl"></div>

                <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900/70 p-6 shadow-2xl shadow-black/30 backdrop-blur-xl sm:p-8">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-300/80">Peixe em destaque</p>
                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-300">#001</span>
                    </div>

                    <div class="mt-6 flex items-center gap-4">
                        <span class="grid h-16 w-16 place-items-center rounded-3xl bg-gradient-to-br from-cyan-400 to-teal-500 text-slate-950 shadow-xl shadow-cyan-500/20">
                            <x-fish-icon class="h-8 w-8" />
                        </span>
                        <div>
                            <h2 class="text-2xl font-semibold text-white">Betta</h2>
                            <p class="text-sm text-slate-400">Água Doce</p>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl border border-white/5 bg-slate-950/40 p-4">
                            <p class="text-xs uppercase tracking-wider text-slate-500">Cor</p>
                            <p class="mt-1 text-sm font-medium text-white">Vermelho</p>
                        </div>
                        <div class="rounded-2xl border border-white/5 bg-slate-950/40 p-4">
                            <p class="text-xs uppercase tracking-wider text-slate-500">Tipo</p>
                            <p class="mt-1 text-sm font-medium text-white">Doce</p>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-between rounded-2xl border border-cyan-400/15 bg-cyan-400/5 px-4 py-3">
                        <span class="text-xs text-cyan-200/80">Tudo em ordem no aquário</span>
                        <span class="h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_12px_rgba(52,211,153,0.8)]"></span>
                    </div>
                </div>

                <div class="absolute -bottom-5 -left-4 hidden rounded-2xl border border-white/10 bg-slate-900/90 px-4 py-3 shadow-xl shadow-black/30 backdrop-blur-md sm:block">
                    <p class="text-xs text-slate-400">Tipos cadastrados</p>
                    <p class="mt-0.5 text-lg font-semibold text-white">3 categorias</p>
                </div>
            </div>
        </section>

        <section class="grid gap-4 md:grid-cols-3">
            <article class="rounded-3xl border border-white/10 bg-slate-900/50 p-6 transition hover:border-cyan-400/30 hover:bg-slate-900/70">
                <div class="grid h-11 w-11 place-items-center rounded-2xl border border-cyan-400/20 bg-cyan-400/10 text-cyan-300">
                    <x-fish-icon class="h-5 w-5" />
                </div>
                <h2 class="mt-4 text-lg font-semibold text-white">Catálogo completo</h2>
                <p class="mt-2 text-sm leading-6 text-slate-400">Veja todos os peixes com nome, cor e tipo em cartões fáceis de navegar.</p>
            </article>

            <article class="rounded-3xl border border-white/10 bg-slate-900/50 p-6 transition hover:border-cyan-400/30 hover:bg-slate-900/70">
                <div class="grid h-11 w-11 place-items-center rounded-2xl border border-cyan-400/20 bg-cyan-400/10 text-cyan-300">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h10" />
                    </svg>
                </div>
                <h2 class="mt-4 text-lg font-semibold text-white">Classificação simples</h2>
                <p class="mt-2 text-sm leading-6 text-slate-400">Crie tipos como água doce, salgada ou fria e mantenha o catálogo organizado.</p>
            </article>

            <article class="rounded-3xl border border-white/10 bg-slate-900/50 p-6 transition hover:border-cyan-400/30 hover:bg-slate-900/70">
                <div class="grid h-11 w-11 place-items-center rounded-2xl border border-cyan-400/20 bg-cyan-400/10 text-cyan-300">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 3v3M12 18v3M3 12h3M18 12h3" />
                        <circle cx="12" cy="12" r="4" />
                    </svg>
                </div>
                <h2 class="mt-4 text-lg font-semibold text-white">Gestão rápida</h2>
                <p class="mt-2 text-sm leading-6 text-slate-400">Cadastre, edite e remova peixes em poucos cliques, direto do catálogo.</p>
            </article>
        </section>

        <section class="overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-r from-cyan-400/10 via-slate-900/40 to-teal-400/10 px-6 py-10 text-center shadow-2xl shadow-black/20 sm:px-10">
            <h2 class="text-2xl font-semibold tracking-tight text-white sm:text-3xl">Pronto para cuidar do seu aquário?</h2>
            <p class="mx-auto mt-3 max-w-xl text-sm text-slate-300">
                Comece agora a montar o catálogo dos seus peixes e mantenha tudo organizado.
            </p>
            <div class="mt-6 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="{{ route('fishes.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    Ver catálogo
                </a>
                <a href="{{ auth()->check() ? route('fishes.create') : route('register') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-6 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                    {{ auth()->check() ? 'Novo peixe' : 'Começar agora' }}
                </a>
            </div>
        </section>
    </div>
@endsection
