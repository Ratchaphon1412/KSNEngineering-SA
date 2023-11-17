<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transection_token',
        'payment_method',
        'pay',
        'payment_status',
        'create_at',
        'confirm_payment_uri',
        'repair_id'


    ];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }
}
