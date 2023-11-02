<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quotation extends Model
{
    use HasFactory;


    protected $fillable = ['company_id', 'user_id', 'discount', 'total', 'grand_total', 'payment_status', 'quotation_pdf', 'purchase_order_pdf'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function orderDetails(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_details', 'quotation_id', 'product_id')->withPivot('quantity', 'sub_total');
    }
}
