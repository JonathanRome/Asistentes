<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
     //$editorial->products
     public function products()
     {
         return $this->hasMany(Product::class);
         
     }
}
