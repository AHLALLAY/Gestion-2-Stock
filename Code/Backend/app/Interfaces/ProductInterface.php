<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function displayProducts();
    public function addProduct($product);
    public function editProduct($data, $productId);
    public function deleteProduct($productId, $typeDelete);

    // statistics
    public function getProductTotal();
    public function getProductByModel($model);
    public function getProductByBrand($brand);

}
