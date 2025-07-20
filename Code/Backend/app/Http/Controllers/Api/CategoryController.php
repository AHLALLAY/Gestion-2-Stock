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


}
