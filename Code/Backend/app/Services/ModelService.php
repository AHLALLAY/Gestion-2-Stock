<?php

namespace App\Services;

use App\Interfaces\ModelInterface;

class ModelService
{
    protected $modelRepo;
    public function __construct(ModelInterface $modelRepo) { $this->modelRepo = $modelRepo; }

    public function displayModels() { return $this->modelRepo->displayModels(); }
    public function addmodel($model) { return $this->modelRepo->addmodel($model); }
    public function updateModelName($modelId, $newModelName) { return $this->modelRepo->updateModelName($modelId, $newModelName); }
    public function deleteModel($modelId, $deletType) { return $this->modelRepo->deleteModel($modelId, $deletType); }
} 