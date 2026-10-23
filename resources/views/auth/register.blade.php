@extends('layouts.app')

@section('title', 'Criar conta')

@section('content')
    <div class="mx-auto max-w-md space-y-6 py-6">
        <div class="text-center">
            <div class="mx-auto grid h-14 w-14 place-items-center rounded-3xl bg-gradient-to-br from-cyan-400 to-teal-500 text-slate-950 shadow-xl shadow-cyan-500/20">
                <x-fish-icon class="h-7 w-7" />
            </div>
            <h1 class="mt-5 text-3xl font-semibold tracking-tight text-white">Crie sua conta</h1>
            <p class="mt-2 text-sm text-slate-400">Comece a organizar seu aquário em poucos segundos.</p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-slate-900/60 p-6 shadow-2xl shadow-black/20 backdrop-blur-sm sm:p-8">
            <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="text-sm font-medium text-slate-200">Nome</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        placeholder="Seu nome"
                        autocomplete="name"
                        required
                        autofocus
                        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20 @error('name') border-rose-400/60 @enderror"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

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
                        placeholder="Mínimo de 8 caracteres"
                        autocomplete="new-password"
                        required
                        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20 @error('password') border-rose-400/60 @enderror"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="text-sm font-medium text-slate-200">Confirmar senha</label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repita a senha"
                        autocomplete="new-password"
                        required
                        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20"
                    >
                </div>

                <button type="submit" class="w-full rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
                    Criar conta
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-slate-400">
            Já tem uma conta?
            <a href="{{ route('login') }}" class="font-semibold text-cyan-300 transition hover:text-cyan-200">Entrar</a>
        </p>
    </div>
@endsection
