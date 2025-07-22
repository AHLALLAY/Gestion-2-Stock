<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepo implements ProductInterface
{
    public function displayProducts()
    {
        try {
            $products = Product::all();
            foreach ($products as $product) {
                $product->image_url = $product->image_url;
            }
            return $products;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addProduct($product)
    {
        try {
            if (isset($product['brand']) && isset($product['model'])) {
                $product['name'] = $product['brand'] . '_' . $product['model'];
            }
            $created = Product::create($product);
            $created->image_url = $created->image_url;
            return $created;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editProduct($data, $productId)
    {
        try {
            $product = Product::find($productId);
            if (!$product) {
                return "Produit non trouvé.";
            }
            $product->fill($data);
            $product->save();
            $product->image_url = $product->image_url;
            return $product;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteProduct($productId, $typeDelete)
    {
        try {
            $product = Product::find($productId);
            if (!$product) {
                return "Produit non trouvé.";
            }
            if ($typeDelete === "soft") {
                $product->is_deleted = true;
                $product->save();
                return $product->name . " archivé avec succès.";
            } else {
                $product->delete();
                return $product->name . " supprimé définitivement avec succès.";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    
} 