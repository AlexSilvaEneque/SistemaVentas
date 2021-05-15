<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'sale_date',
        'tax',
        'total',
        'status'
    ];

    // muchos a uno
    public function user() {
        return $this->belongsTo(User::class);
    }

    // muchos a uno
    public function client() {
        return $this->belongsTo(Client::class);
    }

    // uno a muchos
    public function saleDetails() {
        return $this->hasMany(saleDetail::class);
    }
}
