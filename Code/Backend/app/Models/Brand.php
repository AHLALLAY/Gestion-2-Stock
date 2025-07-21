<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'is_deleted'];
    
    public function model(){
        return $this->hasMany(Modell::class, 'brandId');
    }
}
