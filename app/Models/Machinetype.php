<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machinetype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function machines(): HasMany
    {
        return $this->hasMany(Machine::class);
    }
}
