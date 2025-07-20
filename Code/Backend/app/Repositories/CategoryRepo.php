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

    public function updateCategoryName($categoryId, $newCategoryName)
    {
        
    }

    public function deleteCategory($categoryId, $deletType)
    {
        try {
            $cat = Category::find($categoryId);
            if (!$cat) {
                return "Catégorie non trouvée.";
            }
            if ($deletType === "soft") {
                $cat->is_deleted = true;
                $cat->save();
                return $cat. "archiver avec succès.";
            }else {
                $cat->delete();
                return $cat . "supprimée définitivement avec succès.";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
