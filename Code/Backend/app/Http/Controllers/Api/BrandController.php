<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\BrandService;
use Illuminate\Validation\ValidationException;

class BrandController extends Controller
{
    protected $brandServ;
    
    public function __construct(BrandService $brandServ) { $this->brandServ = $brandServ; }

    public function displayBrands()
    {
        try {
            $result = $this->brandServ->displayBrands();
            return response()->json([
                'message' => 'Catégories trouvées avec succès',
                'categories' => $result,
                'status' => 'success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur inattendue',
                'erreur' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }
    }
    public function addBrand(BrandRequest $brand)
    {
        try {
            $result = $this->brandServ->addBrand($brand->validated());
            return response()->json([
                'message' => 'Catégorie ajoutée avec succès',
                'data' => $result,
                'status' => 'success'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'erreur' => $e->errors(),
                'status' => 'failed'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur inattendue',
                'erreur' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }
    }

    public function updateBrandName($brandId, BrandRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->brandServ->updateBrandName($brandId, $data['name']);
            
            return response()->json([
                'message' => 'Nom de la catégorie mis à jour avec succès',
                'data' => $result,
                'status' => 'success'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'erreur' => $e->errors(),
                'status' => 'failed'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur inattendue',
                'erreur' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }
    }
    
    public function deleteBrand($brandId, BrandRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->brandServ->deleteBrand($brandId, $data['deletType']);
            
            return response()->json([
                'message' => 'Catégorie supprimée avec succès',
                'data' => $result,
                'status' => 'success'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'erreur' => $e->errors(),
                'status' => 'failed'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur inattendue',
                'erreur' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }
    }
}