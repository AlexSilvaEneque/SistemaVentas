<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'user_id',
        'purchase_date',
        'tax',
        'total',
        'status',
        'picture'
    ];

    // muchos a uno
    public function user() {
        return $this->belongsTo(User::class);
    }

    // muchos a uno
    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    // uno a muchos
    public function purchaseDetails() {
        return $this->hasMany(PurchaseDetails::class);
    }
}
