<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['type', 'name','quantity', 'price', 'localisation', 'colorId', 'image', 'is_deleted'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function modell(){
        return $this->belongsTo(Modell::class);
    }

    public function color(){
        return $this->hasMany(Color::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }
}