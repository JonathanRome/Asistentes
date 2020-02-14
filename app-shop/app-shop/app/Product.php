<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    //$product->category
    public function category()
    {
        return $this->belongsTo(Category::class);
        
    }
    //$product->editorial
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
        
    }
     //un porducto tiene muchas imagenes
    public function images()
    {
        return $this->hasMany(ProductImage::class);
        
    }
    //$product->comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //$product->likes
    public function likes()
    {
        return $this->hasMany(like::class);
    }

    public function getFeaturedImageUrlAttribute(){

        $featuredImage=$this->images()->where('featured',true)->first();
        if (!$featuredImage) 
            $featuredImage=$this->images()->first();
        
        if ($featuredImage) {
            return $featuredImage->url;
            // return '/images/products/default.png';
        }

        return '/images/products/default.png';

    }

    public function getCategoryNameAttribute()
    {

    if ($this->category)
    {
      return $this->category->name;
    }
   
    return 'General';

    }

    public function getEditorialNameAttribute()
    {

    if ($this->editorial)
    {
      return $this->editorial->name;
    }
   
    return 'General';

    }

    public function getLikAttribute()
    {
        $likes=$this->likes()->where('choice',true);
       if ($likes->count()!= 0)
       {
            return $likes->count();
       }
       return '';

    }
    
}
