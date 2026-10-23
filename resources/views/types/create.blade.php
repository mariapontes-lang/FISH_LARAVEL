@extends('layouts.app')

@section('title', 'Novo tipo')

@section('content')
    <div class="mx-auto max-w-lg rounded-lg bg-white p-6 shadow">
        <h1 class="mb-6 text-2xl font-bold text-orange-600">Cadastrar tipo</h1>

        <form method="POST" action="{{ route('types.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="mb-1 block font-semibold">Nome do tipo</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Ex: Água Doce" required autofocus
                    class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="rounded bg-orange-500 px-5 py-2 font-semibold text-white hover:bg-orange-600">
                Salvar
            </button>
            <a href="{{ route('types.index') }}" class="ml-2 rounded bg-stone-200 px-5 py-2 font-semibold text-stone-700 hover:bg-stone-300">
                Cancelar
            </a>
        </form>
    </div>
@endsection
