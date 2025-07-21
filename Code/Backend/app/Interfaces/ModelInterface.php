<?php

namespace App\Interfaces;

interface ModelInterface
{
    public function displayModels();
    public function addmodel($model);
    public function updateModelName($modelId, $newModelName);
    public function deleteModel($modelId, $deletType);
}
