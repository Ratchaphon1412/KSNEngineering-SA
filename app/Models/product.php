<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'price',
        'description',
        'amount',
        'post_image'
    ];

    public function image(): HasMany
    {
        return $this->hasMany(productImage::class);
    }

    public function searchableAs(): string
    {
        return 'products_index';
    }
}
