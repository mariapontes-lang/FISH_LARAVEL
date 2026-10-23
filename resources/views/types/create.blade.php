@extends('layouts.app')

@section('title', 'Novo tipo')

@section('content')
    <div class="mx-auto max-w-xl space-y-6">
        <div>
            <a href="{{ route('types.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-cyan-300">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m15 18-6-6 6-6" />
                </svg>
                Voltar para tipos
            </a>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-white">Novo tipo</h1>
            <p class="mt-2 text-sm text-slate-400">Crie uma categoria para organizar os peixes do catálogo.</p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-6 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8">
            <form method="POST" action="{{ route('types.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="text-sm font-medium text-slate-200">Nome do tipo</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        placeholder="Ex.: Água Doce"
                        maxlength="50"
                        required
                        autofocus
                        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20 @error('name') border-rose-400/60 @enderror"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-white/5 pt-6 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('types.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                        Cancelar
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-2.5 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                        Cadastrar tipo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
