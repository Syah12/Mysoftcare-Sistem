<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'sst' => 'array',
    ];

    protected $fillable = [
        'agency_id',
        'pic_id',
        'year',
        'name',
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

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    public function pic(): BelongsTo
    {
        return $this->belongsTo(PIC::class);
    }
}
