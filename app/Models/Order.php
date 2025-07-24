<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = "oid";

    protected $fillable = ['user_id', 'total_price', 'status'];

    protected $casts = [
        'total_price' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'oid');
    }
}
