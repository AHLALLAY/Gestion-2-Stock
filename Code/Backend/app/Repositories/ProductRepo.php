<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepo implements ProductInterface
{
    public function displayProducts()
    {
        try {
            return Product::all();
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
            return Product::create($product);
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
            return Product::where('model', $model)->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getProductByBrand($brand)
    {
        try {
            return Product::where('brand', $brand)->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
} 