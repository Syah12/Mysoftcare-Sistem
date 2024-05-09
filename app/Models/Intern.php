<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intern extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'skills' => 'array',
        'educational_level' => 'array',
        'letter' => 'array',
        'image' => 'array',
        'resume' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'university_id',
        'name',
        'ic',
        'gender',
        'email',
        'phone_number',
        'letter',
        'educational_level',
        'skills',
        'training_period',
        'start_intern',
        'end_intern',
        'image',
        'resume',
        'status',
        'office_position',
        'colour',
    ];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
