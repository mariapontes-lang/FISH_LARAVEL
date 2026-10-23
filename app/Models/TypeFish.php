<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
])]
class TypeFish extends Model
{
    protected $table = 'type_fish';

    public function fishes(): HasMany
    {
        return $this->hasMany(Fish::class, 'typeId');
    }
}
