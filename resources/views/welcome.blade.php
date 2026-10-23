@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <div class="rounded-lg bg-white p-8 text-center shadow">
        <p class="text-6xl">🐟🐠🐡</p>

        <h1 class="mt-4 text-4xl font-bold text-orange-600">Bem-vindo ao Cardume!</h1>

        <p class="mx-auto mt-3 max-w-xl text-stone-600">
            Um site simples para cadastrar peixes e separar eles por tipo
            (água doce, água salgada, etc).
        </p>

        <div class="mt-6 flex flex-wrap justify-center gap-3">
            <a href="{{ route('fishes.index') }}" class="rounded bg-orange-500 px-5 py-2 font-semibold text-white hover:bg-orange-600">
                Ver peixes
            </a>

            @auth
                <a href="{{ route('fishes.create') }}" class="rounded border border-orange-500 px-5 py-2 font-semibold text-orange-600 hover:bg-orange-50">
                    Cadastrar peixe
                </a>
            @else
                <a href="{{ route('register') }}" class="rounded border border-orange-500 px-5 py-2 font-semibold text-orange-600 hover:bg-orange-50">
                    Criar conta
                </a>
            @endauth
        </div>
    </div>

    <h2 class="mt-10 mb-4 text-2xl font-bold">O que dá pra fazer aqui</h2>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-lg bg-white p-5 shadow">
            <h3 class="text-lg font-bold text-orange-600">📋 Listar peixes</h3>
            <p class="mt-2 text-sm text-stone-600">Ver todos os peixes cadastrados com nome, cor e tipo.</p>
        </div>

        <div class="rounded-lg bg-white p-5 shadow">
            <h3 class="text-lg font-bold text-orange-600">🏷️ Criar tipos</h3>
            <p class="mt-2 text-sm text-stone-600">Separar os peixes em tipos, tipo água doce ou salgada.</p>
        </div>

        <div class="rounded-lg bg-white p-5 shadow">
            <h3 class="text-lg font-bold text-orange-600">✏️ Editar e excluir</h3>
            <p class="mt-2 text-sm text-stone-600">Depois de fazer login dá pra editar e apagar os peixes.</p>
        </div>
    </div>
@endsection
