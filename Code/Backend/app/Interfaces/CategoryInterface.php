<?php

namespace App\Interfaces;

interface CategoryInterface
{
    public function displayCategories();
    public function addCategory($category);
    public function updateCategoryName($categoryId, $newCategoryName);
    public function deleteCategory($categoryId, $deletType);
}
