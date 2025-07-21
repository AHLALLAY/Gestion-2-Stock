<?php

namespace App\Services;

use App\Interfaces\BrandInterface;
use App\Repositories\BrandRepo;

class BrandService
{
    protected $brandRepo;
    public function __construct(BrandInterface $brandRepo) { $this->brandRepo = $brandRepo; }

    public function displayBrands() { return $this->brandRepo->displayBrands(); }
    public function addBrand($brand) { return $this->brandRepo->addBrand($brand); }
    public function updateBrandName($brandId, $newBrandName) { return $this->brandRepo->updateBrandName($brandId, $newBrandName); }
    public function deleteBrand($brandId, $deletType) { return $this->brandRepo->deleteBrand($brandId, $deletType); }
}
