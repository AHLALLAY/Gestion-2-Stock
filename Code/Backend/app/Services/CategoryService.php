<?php

namespace App\Services;

use App\Interfaces\CategoryInterface;
use App\Repositories\CategoryRepo;

class CategoryService
{
    protected $catRepo;
    public function __construct(CategoryInterface $catRepo) { return $this->catRepo = $catRepo; }

    public function addCategory($category) { return $this->catRepo->addCategory($category); }
    public function updateCategoryName($categoryId, $newCategoryName) { return $this->catRepo->updateCategoryName($categoryId, $newCategoryName); }
    public function deleteCategory($categoryId, $deletType) { return $this->catRepo->deleteCategory($categoryId, $deletType); }
}
