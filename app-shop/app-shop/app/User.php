<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Cart;
use App\Category;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cc','tel_1','tel_2','address','city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    

    
     public function categorys()
    {
        return $this->belongsToMany(Category::class);//muchos a muchos
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }


    public function getCartAttribute()
    {
        $cart=$this->carts()->where('status','Active')->first();

        if ($cart)
        {
            return $cart;
        }
        $cart=new Cart();
        $cart->status='Active';
        $cart->user_id=$this->id;
        $cart->save();
        
        return $cart;
    }
     public function getCarAttribute()
    {
        $car=$this->carts()->where('status','pending')->get();

       
        return $car;
    }

       public function getProductCategorisAttribute()
    {
        if ( is_null ( $this->categorys()->get())) {
            
            return false;
        }else{
            
            return true;
        }
        
    }


    

   
}
