@extends('layouts.app')

@section('title', 'Entrar')

@section('content')
    <div class="mx-auto max-w-md rounded-lg bg-white p-6 shadow">
        <h1 class="mb-6 text-center text-2xl font-bold text-orange-600">Login</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="mb-1 block font-semibold">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
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
                <label>
                    <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                    Lembrar de mim
                </label>
            </div>

            <button type="submit" class="w-full rounded bg-orange-500 py-2 font-semibold text-white hover:bg-orange-600">
                Entrar
            </button>
        </form>

        {{-- so pra facilitar o teste --}}
        @if (app()->environment('local'))
            <p class="mt-4 rounded bg-yellow-100 p-2 text-sm text-yellow-800">
                Usuário de teste: demo@cardume.test / password
            </p>
        @endif

        <p class="mt-4 text-center text-sm">
            Não tem conta? <a href="{{ route('register') }}" class="text-orange-600 underline">Cadastre-se</a>
        </p>
    </div>
@endsection
