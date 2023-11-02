<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Task extends Model
{
    use HasFactory;

    public function repair(): BelongsTo
    {
        return $this->belongsTo(Repair::class);
    }

    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class);
    }
}
