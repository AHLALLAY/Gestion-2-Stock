<?php

namespace App\Interfaces;

interface StatistiqueInterface
{
    // Products
    public function getProductTotal();
    public function getProductByModel($model);
    public function getProductByBrand($brand);
    public function getProductWinner();

    
}
