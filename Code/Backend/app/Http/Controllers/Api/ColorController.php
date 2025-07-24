<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\BrandService;
use App\Services\ColorService;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    protected $colorService;
    
    public function __construct(ColorService $colorService) { $this->colorService = $colorService; }

    public function displayColors()
    {
        try {
            $result = $this->colorService->displayColors();
            return response()->json([
                'message' => 'Coleurs trouvées avec succès',
                'couleurs' => $result,
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
}