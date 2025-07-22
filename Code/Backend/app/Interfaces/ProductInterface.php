<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function displayProducts();
    public function addProduct($product);
    public function editProduct($data, $productId);
    public function deleteProduct($productId, $typeDelete);
}
