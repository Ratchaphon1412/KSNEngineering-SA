<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'crane_id',
        'image',
        'payment_status'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function crane(): BelongsTo
    {
        return $this->belongsTo(Crane::class);
    }

    public function task(): HasOne
    {
        return $this->hasOne(Task::class);
    }

    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
