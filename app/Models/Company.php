<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use HasFactory;
    use Searchable;

    public function cranes(): HasMany
    {
        return $this->hasMany(Crane::class);
    }

    public function searchableAs(): string
    {
        return 'companies_index';
    }

    public function repairs(): HasMany {
        return $this->hasMany(Repair::class);
    }

}
