@extends('layouts.app')

@section('title', 'Peixes')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-3xl font-bold">Lista de Peixes 🐟</h1>

        @auth
            <a href="{{ route('fishes.create') }}" class="rounded bg-orange-500 px-4 py-2 font-semibold text-white hover:bg-orange-600">
                + Novo peixe
            </a>
        @endauth
    </div>

    <p class="mb-4 text-stone-600">Total de peixes cadastrados: <strong>{{ count($fishes) }}</strong></p>

    @if (count($fishes) == 0)
        <div class="rounded-lg bg-white p-8 text-center text-stone-500 shadow">
            Nenhum peixe cadastrado ainda :(
        </div>
    @else
        <div class="overflow-x-auto rounded-lg bg-white shadow">
            <table class="w-full text-left">
                <thead class="bg-orange-100 text-orange-800">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Cor</th>
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fishes as $fish)
                        <tr class="border-t border-stone-200 hover:bg-orange-50">
                            <td class="px-4 py-3">{{ $fish->id }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $fish->name }}</td>
                            <td class="px-4 py-3">{{ $fish->color }}</td>
                            <td class="px-4 py-3">{{ $fish->type->name }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('fishes.show', $fish) }}" class="rounded bg-stone-200 px-3 py-1 text-sm hover:bg-stone-300">Ver</a>

                                    @auth
                                        <a href="{{ route('fishes.edit', $fish) }}" class="rounded bg-amber-400 px-3 py-1 text-sm hover:bg-amber-500">Editar</a>

                                        <form method="POST" action="{{ route('fishes.destroy', $fish) }}" onsubmit="return confirm('Tem certeza que quer excluir?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-red-500 px-3 py-1 text-sm text-white hover:bg-red-600">Excluir</button>
                                        </form>
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @guest
        <p class="mt-4 text-sm text-stone-500">
            * Faça <a href="{{ route('login') }}" class="text-orange-600 underline">login</a> para cadastrar, editar ou excluir peixes.
        </p>
    @endguest
@endsection
