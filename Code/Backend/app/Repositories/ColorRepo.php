<?php

namespace App\Repositories;

use App\Interfaces\ColorInterface;
use App\Models\Color;

class ColorRepo implements ColorInterface
{
    public function displayColors()
    {
        try{
            $colors = Color::all();
            return $colors;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

}
