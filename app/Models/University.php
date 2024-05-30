<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'postcode',
        'country',
        'district',
        'state',
        'is_university'
    ];

    public function interns(): HasMany
    {
        return $this->HasMany(Intern::class);
    }
}
