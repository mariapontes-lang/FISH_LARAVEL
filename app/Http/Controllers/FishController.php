<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\TypeFish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    // lista todos os peixes
    public function index()
    {
        $fishes = Fish::with('type')->orderBy('id')->get();

        return view('fishes.index', ['fishes' => $fishes]);
    }

    // mostra um peixe
    public function show(Fish $fish)
    {
        return view('fishes.show', ['fish' => $fish]);
    }

    // tela de cadastro
    public function create()
    {
        $types = TypeFish::all();

        return view('fishes.create', ['types' => $types]);
    }

    // salva o peixe no banco
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'color' => 'required|max:100',
            'typeId' => 'required|exists:type_fish,id',
        ]);

        Fish::create($request->only('name', 'color', 'typeId'));

        return redirect()->route('fishes.index')->with('status', 'Peixe cadastrado com sucesso!');
    }

    // tela de editar
    public function edit(Fish $fish)
    {
        $types = TypeFish::all();

        return view('fishes.edit', ['fish' => $fish, 'types' => $types]);
    }

    // atualiza o peixe
    public function update(Request $request, Fish $fish)
    {
        $request->validate([
            'name' => 'required|max:100',
            'color' => 'required|max:100',
            'typeId' => 'required|exists:type_fish,id',
        ]);

        $fish->update($request->only('name', 'color', 'typeId'));

        return redirect()->route('fishes.index')->with('status', 'Peixe atualizado com sucesso!');
    }

    // exclui o peixe
    public function destroy(Fish $fish)
    {
        $fish->delete();

        return redirect()->route('fishes.index')->with('status', 'Peixe excluído!');
    }
}
