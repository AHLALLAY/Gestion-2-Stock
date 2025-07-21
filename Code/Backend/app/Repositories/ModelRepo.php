<?php

namespace App\Repositories;

use App\Interfaces\ModelInterface;
use App\Models\Modell;

class ModelRepo implements ModelInterface
{
    public function displayModels()
    {
        try{
            return Modell::all();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function addmodel($model)
    {
        try{
            return Modell::create($model);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function updateModelName($modelId, $newModelName)
    {
        try{
            $model = Modell::find($modelId);
            if (!$model) {
                return "Modèle non trouvé.";
            }
            $model->name = $newModelName;
            $model->save();
            return $model->name . " renommé avec succès.";
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteModel($modelId, $deletType)
    {
        try {
            $model = Modell::find($modelId);
            if (!$model) {
                return "Modèle non trouvé.";
            }
            if ($deletType === "soft") {
                $model->is_deleted = true;
                $model->save();
                return $model->name . " archivé avec succès.";
            }else {
                $model->delete();
                return $model->name . " supprimé définitivement avec succès.";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
} 