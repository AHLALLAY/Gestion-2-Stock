<?php

namespace App\Repositories;

use App\Interfaces\BrandInterface;
use App\Models\Brand;

class BrandRepo implements BrandInterface
{
    public function displayBrands()
    {
        try{
            $brands = Brand::all();
            return $brands;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function addBrand($brand)
    {
        try{
            return Brand::create($brand);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function updateBrandName($brandId, $newBrandName)
    {
        try{
            $brand = Brand::find($brandId);
            if (!$brand) {
                return "Marque non trouvée.";
            }
            $brand->name = $newBrandName;
            $brand->save();
            return $brand->name . " renommée avec succès.";
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteBrand($brandId, $deletType)
    {
        try {
            $brand = Brand::find($brandId);
            if (!$brand) {
                return "Marque non trouvée.";
            }
            if ($deletType === "soft") {
                $brand->is_deleted = true;
                $brand->save();
                return $brand->name . " archivée avec succès.";
            }else {
                $brand->delete();
                return $brand->name . " supprimée définitivement avec succès.";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
