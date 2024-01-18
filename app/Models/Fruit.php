<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fruit extends Model
{
    use HasFactory;


    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }
}


// $allFruits = Fruit::getAll();