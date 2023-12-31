<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
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
        return $this->hasMany(ProductImage::class);
    }

    public function searchableAs(): string
    {
        return 'products_index';
    }

    public function quotation(): BelongsToMany
    {
        return $this->belongsToMany(Quotation::class, 'order_details');
    }
}
