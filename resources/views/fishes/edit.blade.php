@extends('layouts.app')

@section('title', 'Editar peixe')

@section('content')
    <div class="mx-auto max-w-2xl space-y-6">
        <div>
            <a href="{{ route('fishes.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-cyan-300">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m15 18-6-6 6-6" />
                </svg>
                Voltar ao catálogo
            </a>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-white">Editar peixe</h1>
            <p class="mt-2 text-sm text-slate-400">Atualize as informações de {{ $fish->name }}.</p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-6 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8">
            @include('fishes._form', ['fish' => $fish, 'types' => $types])
        </div>
    </div>
@endsection
