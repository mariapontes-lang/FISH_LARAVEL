<?php

namespace Database\Seeders;

use App\Models\Fish;
use App\Models\TypeFish;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'demo@cardume.test'],
            ['name' => 'Usuario Teste', 'password' => 'password'],
        );

        $types = [
            'Água Doce' => [
                ['name' => 'Guppy', 'color' => 'Laranja'],
                ['name' => 'Neon Tetra', 'color' => 'Azul e vermelho'],
                ['name' => 'Betta', 'color' => 'Vermelho'],
            ],
            'Água Salgada' => [
                ['name' => 'Peixe Palhaço', 'color' => 'Laranja e branco'],
                ['name' => 'Blue Tang', 'color' => 'Azul'],
            ],
            'Água Fria' => [
                ['name' => 'Telescópio', 'color' => 'Preto'],
            ],
        ];

        foreach ($types as $typeName => $fishes) {
            $type = TypeFish::firstOrCreate(['name' => $typeName]);

            foreach ($fishes as $fish) {
                Fish::firstOrCreate(
                    ['name' => $fish['name']],
                    ['color' => $fish['color'], 'typeId' => $type->id],
                );
            }
        }
    }
}
