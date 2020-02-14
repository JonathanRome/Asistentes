<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
      //$like->products
      public function products()
      {
          return $this->belongsTo(Product::class);
          
      }
      //$like->users
      public function users()
      {
          return $this->belongsTo(User::class);
            
      }

}
