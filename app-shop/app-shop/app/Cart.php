<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartDetail;
//un cart le pertenecen a muchos cartdetail
class Cart extends Model
{
    public function details()
    {
    	return $this->hasMany(CartDetail::class);
    }
}
