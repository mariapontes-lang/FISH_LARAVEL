<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Início') - {{ config('app.name', 'Cardume') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-orange-50 text-stone-800">

    {{-- menu de cima --}}
    <nav class="bg-orange-500 text-white shadow">
        <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-3 px-4 py-3">
            <a href="{{ route('home') }}" class="text-2xl font-bold">
                🐠 Cardume
            </a>

            <div class="flex flex-wrap items-center gap-4 text-sm">
                <a href="{{ route('fishes.index') }}" class="hover:underline">Peixes</a>

                @auth
                    <a href="{{ route('types.index') }}" class="hover:underline">Tipos</a>

                    <span class="text-orange-100">Olá, {{ auth()->user()->name }}!</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded bg-white px-3 py-1 font-semibold text-orange-600 hover:bg-orange-100">
                            Sair
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Entrar</a>
                    <a href="{{ route('register') }}" class="rounded bg-white px-3 py-1 font-semibold text-orange-600 hover:bg-orange-100">
                        Cadastrar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="mx-auto w-full max-w-5xl flex-1 px-4 py-8">
        {{-- mensagem de sucesso --}}
        @if (session('status'))
            <div class="mb-6 rounded border border-green-300 bg-green-100 px-4 py-3 text-green-800">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-orange-200 bg-white py-4 text-center text-sm text-stone-500">
        {{ config('app.name', 'Cardume') }} &copy; {{ date('Y') }} - Projeto feito para a ADO de Laravel
    </footer>
</body>
</html>
