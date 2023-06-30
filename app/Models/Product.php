<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function purchase(){
        return $this->hasMany(Purchase::class);
    }

    public function stock(){
        return $this->hasOne(Stock::class);
    }
    
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    public function stock(){
        return $this->hasOne(Stock::class);
    }

}
