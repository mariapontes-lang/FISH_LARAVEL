<?php

namespace App\Http\Controllers;

use App\Models\TypeFish;
use Illuminate\Http\Request;

class TypeFishController extends Controller
{
    // lista os tipos com a quantidade de peixes de cada um
    public function index()
    {
        $types = TypeFish::withCount('fishes')->get();

        return view('types.index', ['types' => $types]);
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:type_fish,name',
        ]);

        TypeFish::create($request->only('name'));

        return redirect()->route('types.index')->with('status', 'Tipo cadastrado com sucesso!');
    }

    public function destroy(TypeFish $type)
    {
        $type->delete();

        return redirect()->route('types.index')->with('status', 'Tipo excluído!');
    }
}
