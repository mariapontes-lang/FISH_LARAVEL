@extends('layouts.app')

@section('title', 'Criar conta')

@section('content')
    <div class="mx-auto max-w-md rounded-lg bg-white p-6 shadow">
        <h1 class="mb-6 text-center text-2xl font-bold text-orange-600">Criar conta</h1>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="mb-1 block font-semibold">Nome</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="mb-1 block font-semibold">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="mb-1 block font-semibold">Senha</label>
                <input id="password" name="password" type="password" required
                    class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="mb-1 block font-semibold">Confirmar senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
            </div>

            <button type="submit" class="w-full rounded bg-orange-500 py-2 font-semibold text-white hover:bg-orange-600">
                Cadastrar
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            Já tem conta? <a href="{{ route('login') }}" class="text-orange-600 underline">Entrar</a>
        </p>
    </div>
@endsection
