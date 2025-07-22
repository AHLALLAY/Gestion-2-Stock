<?php

namespace App\Repositories;

use App\Interfaces\StatistiqueInterface;
use App\Models\Product;

class StatistiqueRepo implements StatistiqueInterface
{
    public function getProductTotal()
    {
        try {
            return Product::count();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getProductByModel($model)
    {
        try {
            $products = Product::where('model', $model)->get();
            foreach ($products as $product) {
                $product->image_url = $product->image_url;
            }
            return $products;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getProductByBrand($brand)
    {
        try {
            $products = Product::where('brand', $brand)->get();
            foreach ($products as $product) {
                $product->image_url = $product->image_url;
            }
            return $products;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getProductWinner()
    {
        try{
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
} 