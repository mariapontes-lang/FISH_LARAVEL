@extends('layouts.app')

@section('title', 'Tipos')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-3xl font-bold">Tipos de Peixe</h1>

        <a href="{{ route('types.create') }}" class="rounded bg-orange-500 px-4 py-2 font-semibold text-white hover:bg-orange-600">
            + Novo tipo
        </a>
    </div>

    @if (count($types) == 0)
        <div class="rounded-lg bg-white p-8 text-center text-stone-500 shadow">
            Nenhum tipo cadastrado ainda.
        </div>
    @else
        <div class="overflow-x-auto rounded-lg bg-white shadow">
            <table class="w-full text-left">
                <thead class="bg-orange-100 text-orange-800">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Qtd. de peixes</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr class="border-t border-stone-200 hover:bg-orange-50">
                            <td class="px-4 py-3">{{ $type->id }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $type->name }}</td>
                            <td class="px-4 py-3">{{ $type->fishes_count }}</td>
                            <td class="px-4 py-3">
                                {{-- se apagar o tipo os peixes dele tambem sao apagados (cascade) --}}
                                <form method="POST" action="{{ route('types.destroy', $type) }}" onsubmit="return confirm('Excluir esse tipo? Os peixes dele também vão ser excluídos!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-red-500 px-3 py-1 text-sm text-white hover:bg-red-600">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
