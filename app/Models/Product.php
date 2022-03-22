<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(ProductImage::class,);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function user(){
    //     return $this->BelongsTo(User::class,'id',);
    // }
    public function rating()
    {
      return $this->hasMany(Rating::class);
    }
}
