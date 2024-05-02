<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $casts = [
        'skills' => 'array',
    ];

    protected $fillable = [
        'name',
        'ic',
        'email',
        'letter',
        'year',
        'educational_level',
        'institutions',
        'skills',
        'university',
        'training_period',
        'start_intern',
        'end_intern',
        'image',
        'resume',
        'status'
    ];
}
