{{-- formulario usado no create e no edit --}}
<form method="POST" action="{{ isset($fish) ? route('fishes.update', $fish) : route('fishes.store') }}">
    @csrf
    @if (isset($fish))
        @method('PATCH')
    @endif

    <div class="mb-4">
        <label for="name" class="mb-1 block font-semibold">Nome</label>
        <input id="name" name="name" type="text" value="{{ old('name', $fish->name ?? '') }}" placeholder="Ex: Betta" required
            class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="color" class="mb-1 block font-semibold">Cor</label>
        <input id="color" name="color" type="text" value="{{ old('color', $fish->color ?? '') }}" placeholder="Ex: Vermelho" required
            class="w-full rounded border border-stone-300 px-3 py-2 focus:border-orange-500 focus:outline-none">
        @error('color')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="typeId" class="mb-1 block font-semibold">Tipo</label>
        <select id="typeId" name="typeId" required
            class="w-full rounded border border-stone-300 bg-white px-3 py-2 focus:border-orange-500 focus:outline-none">
            <option value="">-- Selecione --</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @selected(old('typeId', $fish->typeId ?? '') == $type->id)>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        @error('typeId')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @if (count($types) == 0)
        <p class="mb-4 rounded bg-yellow-100 p-3 text-sm text-yellow-800">
            Ainda não tem nenhum tipo cadastrado.
            <a href="{{ route('types.create') }}" class="underline">Clique aqui para criar um tipo</a>.
        </p>
    @endif

    <button type="submit" class="rounded bg-orange-500 px-5 py-2 font-semibold text-white hover:bg-orange-600">
        Salvar
    </button>
    <a href="{{ route('fishes.index') }}" class="ml-2 rounded bg-stone-200 px-5 py-2 font-semibold text-stone-700 hover:bg-stone-300">
        Cancelar
    </a>
</form>
