<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Project extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditingAuditable;

    protected $casts = [
        'sst' => 'array',
        'pic_id' => 'array'
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
        'status',
        'mileage',
        'date',
        'place',
        'status_mileage'
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
