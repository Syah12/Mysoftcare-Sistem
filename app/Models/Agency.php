<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address',
        'postcode',
        'state',
        'district',
        'country'
    ];

    public function pic(): HasOne
    {
        return $this->hasOne(PIC::class);
    }

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }
}
