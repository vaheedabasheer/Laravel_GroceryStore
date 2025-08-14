<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
   protected $primarykey="id";
   protected $fillable=['name','email','phone','message'];
}
