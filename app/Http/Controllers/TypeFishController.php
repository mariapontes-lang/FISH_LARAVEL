<?php

namespace App\Http\Controllers;

use App\Models\TypeFish;
use Illuminate\Http\Request;

class TypeFishController extends Controller
{
    public function index()
    {
        $types = TypeFish::withCount('fishes')->orderBy('name')->get();

        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:type_fish,name'],
        ]);

        TypeFish::create($data);

        return redirect()
            ->route('types.index')
            ->with('status', 'Tipo cadastrado com sucesso.');
    }

    public function destroy(TypeFish $type)
    {
        $type->delete();

        return redirect()
            ->route('types.index')
            ->with('status', 'Tipo removido junto com seus peixes.');
    }
}
