@extends('layouts.app')

@section('title', $fish->name)

@section('content')
    <div class="mx-auto max-w-3xl space-y-6">
        <a href="{{ route('fishes.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-cyan-300">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m15 18-6-6 6-6" />
            </svg>
            Voltar ao catálogo
        </a>

        <article class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/60 shadow-2xl shadow-black/20 backdrop-blur-sm">
            <div class="relative h-44 overflow-hidden bg-gradient-to-br from-cyan-500/30 via-slate-900 to-teal-500/20">
                <div class="absolute -right-10 top-6 h-32 w-32 rounded-full border border-cyan-300/20"></div>
                <div class="absolute right-24 top-16 h-16 w-16 rounded-full border border-cyan-300/15"></div>
                <div class="absolute bottom-6 left-8 h-10 w-10 rounded-full border border-cyan-300/10"></div>

                <div class="absolute inset-x-0 bottom-0 flex items-end gap-4 bg-gradient-to-t from-slate-900/90 to-transparent p-6 sm:p-8">
                    <span class="grid h-16 w-16 shrink-0 place-items-center rounded-3xl bg-gradient-to-br from-cyan-400 to-teal-500 text-slate-950 shadow-xl shadow-cyan-500/20">
                        <x-fish-icon class="h-8 w-8" />
                    </span>
                    <div class="min-w-0 pb-1">
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-300/80">Peixe #{{ str_pad($fish->id, 3, '0', STR_PAD_LEFT) }}</p>
                        <h1 class="mt-1 truncate text-3xl font-semibold tracking-tight text-white">{{ $fish->name }}</h1>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 p-6 sm:grid-cols-2 sm:p-8">
                <div class="rounded-2xl border border-white/5 bg-slate-950/40 p-4">
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Cor</p>
                    <p class="mt-1 text-base font-medium text-white">{{ $fish->color }}</p>
                </div>
                <div class="rounded-2xl border border-white/5 bg-slate-950/40 p-4">
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Tipo</p>
                    <p class="mt-1 text-base font-medium text-white">{{ $fish->type?->name ?? 'Sem tipo' }}</p>
                </div>
                <div class="rounded-2xl border border-white/5 bg-slate-950/40 p-4">
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Cadastrado em</p>
                    <p class="mt-1 text-base font-medium text-white">{{ $fish->created_at?->format('d/m/Y') ?? '—' }}</p>
                </div>
                <div class="rounded-2xl border border-white/5 bg-slate-950/40 p-4">
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Atualizado em</p>
                    <p class="mt-1 text-base font-medium text-white">{{ $fish->updated_at?->format('d/m/Y') ?? '—' }}</p>
                </div>
            </div>

            <div class="flex flex-col gap-3 border-t border-white/5 px-6 py-5 sm:flex-row sm:items-center sm:justify-end sm:px-8">
                <a href="{{ route('fishes.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                    Voltar
                </a>

                @auth
                    <a href="{{ route('fishes.edit', $fish) }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-2.5 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                        Editar peixe
                    </a>
                @endauth
            </div>
        </article>
    </div>
@endsection
