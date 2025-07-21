<?php

use App\Http\Controllers\Api\BrandController;
use Illuminate\Support\Facades\Route;

Route::controller(BrandController::class)->group(function(){
    Route::get('/brands', 'displayBrands');
    Route::post('/brands', 'addBrand');
    Route::patch('/brands/{brandId}/name', 'updateBrandName');
    Route::delete('/brands/{brandId}', 'deleteBrand');
});