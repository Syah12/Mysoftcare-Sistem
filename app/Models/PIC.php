<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PIC extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'position_id',
        'name',
        'phone_number'
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }
}
