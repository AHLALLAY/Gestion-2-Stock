<?php

namespace App\Services;

use App\Interfaces\ProductInterface;

class ProductService
{
    protected $productRepo;
    public function __construct(ProductInterface $productRepo) { $this->productRepo = $productRepo; }

    public function displayProducts() { return $this->productRepo->displayProducts(); }
    public function addProduct($product) { return $this->productRepo->addProduct($product); }
    public function editProduct($productId) { return $this->productRepo->editProduct($productId); }
    public function deleteProduct($productId, $typeDelete) { return $this->productRepo->deleteProduct($productId, $typeDelete); }
    public function getProductTotal() { return $this->productRepo->getProductTotal(); }
    public function getProductByModel($model) { return $this->productRepo->getProductByModel($model); }
    public function getProductByBrand($brand) { return $this->productRepo->getProductByBrand($brand); }
} 