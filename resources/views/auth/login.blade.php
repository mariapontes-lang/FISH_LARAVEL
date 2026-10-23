@extends('layouts.app')

@section('title', 'Entrar')

@section('content')
    <div class="mx-auto max-w-md space-y-6 py-6">
        <div class="text-center">
            <div class="mx-auto grid h-14 w-14 place-items-center rounded-3xl bg-gradient-to-br from-cyan-400 to-teal-500 text-slate-950 shadow-xl shadow-cyan-500/20">
                <x-fish-icon class="h-7 w-7" />
            </div>
            <h1 class="mt-5 text-3xl font-semibold tracking-tight text-white">Bem-vindo de volta</h1>
            <p class="mt-2 text-sm text-slate-400">Entre para gerenciar os peixes e tipos do seu aquário.</p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-6 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8">
            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="text-sm font-medium text-slate-200">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="voce@email.com"
                        autocomplete="email"
                        required
                        autofocus
                        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20 @error('email') border-rose-400/60 @enderror"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-slate-200">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Sua senha"
                        autocomplete="current-password"
                        required
                        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20 @error('password') border-rose-400/60 @enderror"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="remember" value="1" @checked(old('remember')) class="h-4 w-4 rounded border-white/20 bg-slate-950 text-cyan-400 focus:ring-cyan-400/40">
                    Manter conectado
                </label>

                <button type="submit" class="w-full rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                    Entrar
                </button>
            </form>

            @if (app()->environment('local'))
                <div class="mt-5 rounded-2xl border border-white/5 bg-slate-950/40 px-4 py-3 text-xs text-slate-400">
                    Conta de demonstração: <span class="font-medium text-slate-200">demo@aquario.test</span> / <span class="font-medium text-slate-200">password</span>
                </div>
            @endif
        </div>

        <p class="text-center text-sm text-slate-400">
            Ainda não tem conta?
            <a href="{{ route('register') }}" class="font-semibold text-cyan-300 transition hover:text-cyan-200">Criar conta</a>
        </p>
    </div>
@endsection
