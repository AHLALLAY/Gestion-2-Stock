<?php

namespace App\Services;

use App\Interfaces\ColorInterface;

class ColorService
{
    protected $colorRepo;
    public function __construct(ColorInterface $colorRepo) { $this->colorRepo = $colorRepo; }

    public function displayColors() { return $this->colorRepo->displayColors(); }
} 