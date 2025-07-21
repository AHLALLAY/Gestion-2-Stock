<?php

namespace App\Interfaces;

interface BrandInterface
{
    public function displayBrands();
    public function addBrand($Brand);
    public function updateBrandName($BrandId, $newBrandName);
    public function deleteBrand($BrandId, $deletType);
}
