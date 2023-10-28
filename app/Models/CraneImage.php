<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CraneImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'crane_id',
        'image',
    ];


    public function crane(): BelongsTo
    {
        return $this->belongsTo(Crane::class);
    }
}
