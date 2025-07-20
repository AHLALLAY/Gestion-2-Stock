<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepo implements CategoryInterface
{
    public function addCategory($category)
    {
        try{
            return Category::create($category);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function updateCategoryName($newCategoryName)
    {
        
    }

    public function deleteCategory($category, $deletType)
    {
        
    }
}
