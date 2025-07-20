<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    protected $CatServ;
    
    public function __construct(CategoryService $CatServ) { $this->CatServ = $CatServ; }

    public function displayCategories()
    {
        try {
            $result = $this->CatServ->displayCategories();
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
    public function addCategory(CategoryRequest $category)
    {
        try {
            $result = $this->CatServ->addCategory($category->validated());
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

    public function updateCategoryName($categoryId, CategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->CatServ->updateCategoryName($categoryId, $data['name']);
            
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
    
    public function deleteCategory($categoryId, CategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->CatServ->deleteCategory($categoryId, $data['deletType']);
            
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