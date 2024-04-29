<?php

namespace App\Models;

use App\Observers\EmployeeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([EmployeeObserver::class])]
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'birth_date',
        'phone_number',
        'gender',
        'type',
        'university',
        'education',
        'start_intern',
        'end_intern',
        'office_position'
    ];

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
