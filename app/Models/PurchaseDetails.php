<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price'
    ];

    // muchos a uno
    public function purchase() {
        return $this->belongsTo(Purchase::class);
    }

    // muchos a uno
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
