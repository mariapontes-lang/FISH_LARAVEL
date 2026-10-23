<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\TypeFish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index()
    {
        $fishes = Fish::with('type')->latest()->paginate(9);

        $totalFishes = Fish::count();
        $totalTypes = TypeFish::count();
        $lastUpdate = Fish::latest('updated_at')->first()?->updated_at;

        return view('fishes.index', compact('fishes', 'totalFishes', 'totalTypes', 'lastUpdate'));
    }

    public function show(Fish $fish)
    {
        $fish->load('type');

        return view('fishes.show', compact('fish'));
    }

    public function create()
    {
        $types = TypeFish::orderBy('name')->get();

        return view('fishes.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'color' => ['required', 'string', 'max:100'],
            'typeId' => ['required', 'exists:type_fish,id'],
        ]);

        Fish::create($data);

        return redirect()
            ->route('fishes.index')
            ->with('status', 'Peixe cadastrado com sucesso.');
    }

    public function edit(Fish $fish)
    {
        $types = TypeFish::orderBy('name')->get();

        return view('fishes.edit', compact('fish', 'types'));
    }

    public function update(Request $request, Fish $fish)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'color' => ['required', 'string', 'max:100'],
            'typeId' => ['required', 'exists:type_fish,id'],
        ]);

        $fish->update($data);

        return redirect()
            ->route('fishes.index')
            ->with('status', 'Peixe atualizado com sucesso.');
    }

    public function destroy(Fish $fish)
    {
        $fish->delete();

        return redirect()
            ->route('fishes.index')
            ->with('status', 'Peixe removido do catálogo.');
    }
}
