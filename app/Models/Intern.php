<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $casts = [
        'skills' => 'array',
        'educational_level' => 'array',
        'letter' => 'array',
        'image' => 'array',
        'resume' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'ic',
        'gender',
        'email',
        'phone_number',
        'letter',
        'educational_level',
        'skills',
        'university',
        'training_period',
        'start_intern',
        'end_intern',
        'image',
        'resume',
        'status',
        'office_position',
        'colour',
    ];
}
