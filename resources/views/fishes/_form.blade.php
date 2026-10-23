@php
    $fish = $fish ?? null;
    $inputClasses = 'w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm text-white placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-cyan-400/60 focus:ring-2 focus:ring-cyan-400/20';
@endphp

<form method="POST" action="{{ $fish ? route('fishes.update', $fish) : route('fishes.store') }}" class="space-y-6">
    @csrf
    @if ($fish)
        @method('PATCH')
    @endif

    <div>
        <label for="name" class="text-sm font-medium text-slate-200">Nome do peixe</label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $fish?->name) }}"
            placeholder="Ex.: Betta"
            maxlength="100"
            required
            class="{{ $inputClasses }} mt-2 @error('name') border-rose-400/60 @enderror"
        >
        @error('name')
            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label for="color" class="text-sm font-medium text-slate-200">Cor</label>
            <div class="mt-2 flex items-center gap-2">
                <input
                    type="color"
                    value="#22d3ee"
                    data-color-picker="#color"
                    aria-label="Escolher uma cor"
                    class="h-12 w-12 shrink-0 cursor-pointer rounded-xl border border-white/10 bg-slate-950/60 p-1"
                >
                <input
                    id="color"
                    name="color"
                    type="text"
                    value="{{ old('color', $fish?->color) }}"
                    placeholder="Ex.: Azul elétrico"
                    maxlength="100"
                    required
                    class="{{ $inputClasses }} @error('color') border-rose-400/60 @enderror"
                >
            </div>
            @error('color')
                <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="typeId" class="text-sm font-medium text-slate-200">Tipo</label>
            <select
                id="typeId"
                name="typeId"
                required
                class="{{ $inputClasses }} mt-2 appearance-none @error('typeId') border-rose-400/60 @enderror"
            >
                <option value="" class="bg-slate-900">Selecione um tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" class="bg-slate-900" @selected((string) old('typeId', $fish?->typeId) === (string) $type->id)>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('typeId')
                <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @if ($types->isEmpty())
        <div class="flex items-start gap-3 rounded-2xl border border-amber-400/20 bg-amber-400/10 px-4 py-3 text-sm text-amber-100">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 9v4M12 17h.01" />
                <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z" />
            </svg>
            <p>
                Nenhum tipo cadastrado ainda.
                <a href="{{ route('types.create') }}" class="font-semibold text-amber-200 underline underline-offset-4">Cadastre um tipo</a>
                antes de adicionar o peixe.
            </p>
        </div>
    @endif

    <div class="flex flex-col-reverse gap-3 border-t border-white/5 pt-6 sm:flex-row sm:items-center sm:justify-end">
        <a href="{{ route('fishes.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
            Cancelar
        </a>
        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-cyan-400 to-teal-400 px-5 py-2.5 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:brightness-110">
            {{ $fish ? 'Salvar alterações' : 'Cadastrar peixe' }}
        </button>
    </div>
</form>
