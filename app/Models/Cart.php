<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey='cart_id';
    protected $fillable=['user_id','pid','quantity'];
      // Add this relationship
public function product()
{
    return $this->belongsTo(Product::class, 'pid', 'pid');
}


}
