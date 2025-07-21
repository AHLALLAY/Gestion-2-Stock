<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['type', 'name','quantity', 'price', 'localisation', 'colorId', 'is_deleted'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function modell(){
        return $this->belongsTo(Modell::class);
    }
}