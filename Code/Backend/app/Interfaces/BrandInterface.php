<?php

namespace App\Interfaces;

interface BrandInterface
{
    public function displayBrands();
    public function addBrand($brand);
    public function updateBrandName($brandId, $newBrandName);
    public function deleteBrand($brandId, $deletType);
}
