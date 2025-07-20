<?php

namespace App\Interfaces;

interface CategoryInterface
{
    public function addCategory($category);
    public function updateCategoryName($newCategoryName);
    public function deleteCategory($category, $deletType);
}
