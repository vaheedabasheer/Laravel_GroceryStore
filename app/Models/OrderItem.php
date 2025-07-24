<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    
    protected $table = 'order_items'; 
      protected $fillable = ['oid', 'pid', 'quantity', 'price'];
       public function order()
    {
        return $this->belongsTo(Order::class, 'oid');
    }
}


