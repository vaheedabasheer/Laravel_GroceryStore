<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
       protected $primaryKey = 'pid';
       protected $fillable=['cid','product','price','stock','description','image'];
}
