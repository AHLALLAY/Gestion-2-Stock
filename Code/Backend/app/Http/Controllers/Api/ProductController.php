<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    protected $productServ;
    public function __construct(ProductService $productServ) { $this->productServ = $productServ; }

    public function displayProducts()
    {
        try {
            $result = $this->productServ->displayProducts();
            return response()->json([
                'message' => 'Produits trouvés avec succès',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addProduct(ProductRequest $request)
    {
        try {
            $result = $this->productServ->addProduct($request->validated());
            return response()->json([
                'message' => 'Produit ajouté avec succès',
                'data' => $result
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function editProduct($productId, ProductRequest $request)
    {
        try {
            $result = $this->productServ->editProduct($productId, $request->validated());
            return response()->json([
                'message' => 'Produit modifié avec succès',
                'data' => $result
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteProduct($productId, ProductRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->productServ->deleteProduct($productId, $data['typeDelete']);
            return response()->json([
                'message' => 'Produit supprimé avec succès',
                'data' => $result
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Statistiques
    public function getProductTotal()
    {
        try {
            $result = $this->productServ->getProductTotal();
            return response()->json([
                'message' => 'Total des produits',
                'total' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getProductByModel($model)
    {
        try {
            $result = $this->productServ->getProductByModel($model);
            return response()->json([
                'message' => 'Produits par modèle',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getProductByBrand($brand)
    {
        try {
            $result = $this->productServ->getProductByBrand($brand);
            return response()->json([
                'message' => 'Produits par marque',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
} 