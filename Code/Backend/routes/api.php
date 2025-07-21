<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ModelController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::controller(BrandController::class)->group(function(){
    Route::get('/brands', 'displayBrands');
    Route::post('/brands', 'addBrand');
    Route::patch('/brands/{brandId}/name', 'updateBrandName');
    Route::delete('/brands/{brandId}', 'deleteBrand');
});

Route::controller(ModelController::class)->group(function(){
    Route::get('/models', 'displayModels');
    Route::post('/models', 'addModel');
    Route::patch('/models/{modelId}/name', 'updateModelName');
    Route::delete('/models/{modelId}', 'deleteModel');
});