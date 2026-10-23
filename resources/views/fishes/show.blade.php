@extends('layouts.app')

@section('title', $fish->name)

@section('content')
    <div class="mx-auto max-w-lg rounded-lg bg-white p-6 shadow">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">🐟 {{ $fish->name }}</h1>

        <p class="mb-2"><strong>ID:</strong> {{ $fish->id }}</p>
        <p class="mb-2"><strong>Cor:</strong> {{ $fish->color }}</p>
        <p class="mb-2"><strong>Tipo:</strong> {{ $fish->type->name }}</p>
        <p class="mb-2"><strong>Cadastrado em:</strong> {{ $fish->created_at->format('d/m/Y H:i') }}</p>
        <p class="mb-6"><strong>Atualizado em:</strong> {{ $fish->updated_at->format('d/m/Y H:i') }}</p>

        <a href="{{ route('fishes.index') }}" class="rounded bg-stone-200 px-4 py-2 font-semibold text-stone-700 hover:bg-stone-300">
            Voltar
        </a>

        @auth
            <a href="{{ route('fishes.edit', $fish) }}" class="ml-2 rounded bg-orange-500 px-4 py-2 font-semibold text-white hover:bg-orange-600">
                Editar
            </a>
        @endauth
    </div>
@endsection
