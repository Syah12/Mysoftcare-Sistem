<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'sst' => 'array',
    ];

    protected $fillable = [
        'year',
        'name',
        'agency',
        'pic_agency',
        'contract_period',
        'contract_guarentee',
        'start_date_contract',
        'end_date_contract',
        'contract_value',
        'sst',
        'notes',
        'creator',
        'status'
    ];
}
