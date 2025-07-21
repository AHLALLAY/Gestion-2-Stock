<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modell extends Model
{
    protected $fillable = ['name', 'brandId'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
