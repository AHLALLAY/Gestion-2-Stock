<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Services\ModelService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ModelController extends Controller
{
    protected $modelServ;
    public function __construct(ModelService $modelServ) { $this->modelServ = $modelServ; }

    public function displayModels()
    {
        try {
            $result = $this->modelServ->displayModels();
            return response()->json([
                'message' => 'Modèles trouvés avec succès',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addModel(ModelRequest $request)
    {
        try {
            $result = $this->modelServ->addmodel($request->validated());
            return response()->json([
                'message' => 'Modèle ajouté avec succès',
                'data' => $result
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateModelName($modelId, ModelRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->modelServ->updateModelName($modelId, $data['name']);
            return response()->json([
                'message' => 'Nom du modèle mis à jour avec succès',
                'data' => $result
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteModel($modelId, ModelRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->modelServ->deleteModel($modelId, $data['deletType']);
            return response()->json([
                'message' => 'Modèle supprimé avec succès',
                'data' => $result
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
} 