<?php

namespace App\Services;

use App\Interfaces\StatistiqueInterface;

class StatisticService
{
    protected $statRepo;
    public function __construct(StatistiqueInterface $statRepo) { $this->statRepo = $statRepo; }

  
    public function getProductTotal() { return $this->statRepo->getProductTotal(); }
    public function getProductByModel($model) { return $this->statRepo->getProductByModel($model); }
    public function getProductByBrand($brand) { return $this->statRepo->getProductByBrand($brand); }
} 