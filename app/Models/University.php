<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'postcode',
        'country',
        'district',
        'state',
        'email',
        'is_university'
    ];

    public function interns(): HasMany
    {
        return $this->HasMany(Intern::class);
    }
}
