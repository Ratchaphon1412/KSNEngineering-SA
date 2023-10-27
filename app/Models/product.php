<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class product extends Model
{
    use HasFactory;

    public function image(): HasMany
    {
        return $this->hasMany(productImage::class);
    }
}
