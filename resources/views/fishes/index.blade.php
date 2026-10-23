@extends('layouts.app')

@section('title', 'Peixes')

@section('content')
    <div class="space-y-8">
        <section class="flex flex-col gap-6 rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-cyan-300/80">Catálogo</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white sm:text-4xl">Seus peixes, em um só lugar</h1>
                <p class="mt-3 text-sm leading-6 text-slate-300">
                    Explore os peixes cadastrados, descubra seus tipos e mantenha o aquário sempre organizado.
                </p>
            </div>

            @auth
                <a href="{{ route('fishes.create') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Novo peixe
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                    Entrar para adicionar
                </a>
            @endauth
        </section>

        <section class="grid gap-4 sm:grid-cols-3">
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-5">
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Peixes no catálogo</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $totalFishes }}</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-5">
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Tipos cadastrados</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $totalTypes }}</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-5">
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Última atualização</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $lastUpdate?->format('d/m/Y') ?? '—' }}</p>
            </div>
        </section>

        @if ($fishes->isEmpty())
            <section class="rounded-3xl border border-dashed border-white/15 bg-slate-900/40 px-6 py-16 text-center">
                <div class="mx-auto grid h-16 w-16 place-items-center rounded-3xl border border-cyan-400/20 bg-cyan-400/10 text-cyan-300">
                    <x-fish-icon class="h-8 w-8" />
                </div>
                <h2 class="mt-5 text-xl font-semibold text-white">O aquário está vazio</h2>
                <p class="mx-auto mt-2 max-w-md text-sm text-slate-400">
                    Cadastre o primeiro peixe para começar a montar o seu catálogo.
                </p>
                <a href="{{ auth()->check() ? route('fishes.create') : route('login') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-white/10 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/15">
                    {{ auth()->check() ? 'Cadastrar peixe' : 'Entrar para cadastrar' }}
                </a>
            </section>
        @else
            <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @php($swatches = [
                    'from-cyan-400 to-teal-500',
                    'from-orange-400 to-rose-500',
                    'from-sky-400 to-indigo-500',
                    'from-emerald-400 to-lime-500',
                    'from-fuchsia-400 to-purple-500',
                    'from-amber-400 to-orange-500',
                ])

                @foreach ($fishes as $fish)
                    <article class="group relative flex flex-col overflow-hidden rounded-3xl border border-white/10 bg-slate-900/60 p-5 shadow-xl shadow-black/10 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900/80">
                        <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-cyan-400/10 to-transparent"></div>

                        <div class="relative flex items-start justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-gradient-to-br {{ $swatches[$fish->id % count($swatches)] }} text-slate-950 shadow-lg">
                                    <x-fish-icon class="h-6 w-6" />
                                </span>
                                <div class="min-w-0">
                                    <h2 class="truncate text-lg font-semibold text-white">{{ $fish->name }}</h2>
                                    <p class="truncate text-xs uppercase tracking-wider text-slate-400">{{ $fish->type?->name ?? 'Sem tipo' }}</p>
                                </div>
                            </div>
                            <span class="shrink-0 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-200">
                                {{ $fish->color }}
                            </span>
                        </div>

                        <div class="relative mt-6 flex items-center justify-between border-t border-white/5 pt-4">
                            <span class="text-xs text-slate-500">#{{ str_pad($fish->id, 3, '0', STR_PAD_LEFT) }}</span>

                            <div class="flex items-center gap-2">
                                <a href="{{ route('fishes.show', $fish) }}" class="rounded-full px-3 py-1.5 text-xs font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                                    Detalhes
                                </a>

                                @auth
                                    <a href="{{ route('fishes.edit', $fish) }}" class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-medium text-slate-200 transition hover:border-cyan-400/30 hover:text-white">
                                        Editar
                                    </a>
                                    <form method="POST" action="{{ route('fishes.destroy', $fish) }}" onsubmit="return confirm('Excluir este peixe?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full px-3 py-1.5 text-xs font-medium text-rose-300 transition hover:bg-rose-500/10">
                                            Excluir
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>

            @if ($fishes->hasPages())
                <div class="flex flex-col items-center justify-between gap-4 rounded-2xl border border-white/10 bg-slate-900/50 px-5 py-4 text-sm text-slate-400 sm:flex-row">
                    <p>Mostrando {{ $fishes->firstItem() }}–{{ $fishes->lastItem() }} de {{ $fishes->total() }} peixes</p>

                    <div class="flex items-center gap-2">
                        @if ($fishes->onFirstPage())
                            <span class="cursor-not-allowed rounded-full border border-white/5 px-4 py-2 text-slate-600">Anterior</span>
                        @else
                            <a href="{{ $fishes->previousPageUrl() }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-slate-200 transition hover:bg-white/10 hover:text-white">Anterior</a>
                        @endif

                        @if ($fishes->hasMorePages())
                            <a href="{{ $fishes->nextPageUrl() }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-slate-200 transition hover:bg-white/10 hover:text-white">Próxima</a>
                        @else
                            <span class="cursor-not-allowed rounded-full border border-white/5 px-4 py-2 text-slate-600">Próxima</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
