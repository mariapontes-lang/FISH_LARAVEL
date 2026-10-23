@extends('layouts.app')

@section('title', 'Tipos')

@section('content')
    <div class="space-y-8">
        <section class="flex flex-col gap-6 rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-cyan-300/80">Organização</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white sm:text-4xl">Tipos de peixe</h1>
                <p class="mt-3 text-sm leading-6 text-slate-300">
                    Agrupe os peixes por água doce, salgada ou qualquer categoria que fizer sentido para o seu aquário.
                </p>
            </div>

            <a href="{{ route('types.create') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Novo tipo
            </a>
        </section>

        @if ($types->isEmpty())
            <section class="rounded-3xl border border-dashed border-white/15 bg-slate-900/40 px-6 py-16 text-center">
                <div class="mx-auto grid h-16 w-16 place-items-center rounded-3xl border border-cyan-400/20 bg-cyan-400/10 text-cyan-300">
                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 6h16M4 12h16M4 18h10" />
                    </svg>
                </div>
                <h2 class="mt-5 text-xl font-semibold text-white">Nenhum tipo cadastrado</h2>
                <p class="mx-auto mt-2 max-w-md text-sm text-slate-400">
                    Crie o primeiro tipo para poder classificar os peixes do catálogo.
                </p>
                <a href="{{ route('types.create') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-white/10 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/15">
                    Cadastrar tipo
                </a>
            </section>
        @else
            <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($types as $type)
                    <article class="flex flex-col justify-between rounded-3xl border border-white/10 bg-slate-900/60 p-5 shadow-xl shadow-black/10 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/30 hover:bg-slate-900/80">
                        <div class="flex items-start justify-between gap-3">
                            <div class="grid h-11 w-11 place-items-center rounded-2xl border border-cyan-400/20 bg-cyan-400/10 text-cyan-300">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M4 7h16M4 12h16M4 17h10" />
                                </svg>
                            </div>
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-200">
                                {{ $type->fishes_count }} {{ $type->fishes_count === 1 ? 'peixe' : 'peixes' }}
                            </span>
                        </div>

                        <div class="mt-5">
                            <h2 class="text-lg font-semibold text-white">{{ $type->name }}</h2>
                            <p class="mt-1 text-xs text-slate-500">Cadastrado em {{ $type->created_at?->format('d/m/Y') ?? '—' }}</p>
                        </div>

                        <div class="mt-5 flex items-center justify-between border-t border-white/5 pt-4">
                            <a href="{{ route('fishes.index') }}" class="rounded-full px-3 py-1.5 text-xs font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                                Ver peixes
                            </a>

                            @if ($type->fishes_count === 0)
                                <form method="POST" action="{{ route('types.destroy', $type) }}" onsubmit="return confirm('Excluir este tipo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full px-3 py-1.5 text-xs font-medium text-rose-300 transition hover:bg-rose-500/10">
                                        Excluir
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('types.destroy', $type) }}" onsubmit="return confirm('Excluir este tipo também removerá {{ $type->fishes_count }} peixe(s). Continuar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full px-3 py-1.5 text-xs font-medium text-rose-300 transition hover:bg-rose-500/10">
                                        Excluir
                                    </button>
                                </form>
                            @endif
                        </div>
                    </article>
                @endforeach
            </section>
        @endif
    </div>
@endsection
