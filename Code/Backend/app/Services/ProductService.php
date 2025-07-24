<?php

namespace App\Services;

use App\Interfaces\ProductInterface;

class ProductService
{
    protected $productRepo;
    public function __construct(ProductInterface $productRepo) { $this->productRepo = $productRepo; }

    public function displayProducts() { return $this->productRepo->displayProducts(); }
    public function addProduct($product) { return $this->productRepo->addProduct($product); }
    public function editProduct($data, $productId) { return $this->productRepo->editProduct($data, $productId); }
    public function deleteProduct($productId, $typeDelete) { return $this->productRepo->deleteProduct($productId, $typeDelete); }
} 