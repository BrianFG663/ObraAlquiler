<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{

    use HasFactory;

    protected $fillable = [
        'machinetype_id',
        'serial_number',
        'model',
        'maintenance_km',
        'life_time_km',
    ];

    public function machineType(): BelongsTo
    {
        return $this->belongsTo(Machinetype::class,'machinetype_id');
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

     public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    
}
