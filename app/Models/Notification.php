<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $primaryKey='nid';
  protected $fillable=['user_id','message','is_read'];
}
