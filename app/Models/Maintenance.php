<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{

            use HasFactory;

    protected $fillable = [
        'serial_number',
        'machine_id',
        'kilometers_maintenances',
        'description',
        'maintenance_date'
    ];

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
