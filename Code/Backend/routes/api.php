<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\ModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::controller(BrandController::class)->group(function(){
    Route::get('/brands', 'displayBrands');
    Route::post('/brands', 'addBrand');
    Route::patch('/brands/{brandId}/name', 'updateBrandName');
    Route::delete('/brands/{brandId}', 'deleteBrand');
});

Route::controller(ColorController::class)->group(function(){
    Route::get('/colors', 'displayColors');
});

Route::controller(ModelController::class)->group(function(){
    Route::get('/models', 'displayModels');
    Route::post('/models', 'addModel');
    Route::patch('/models/{modelId}/name', 'updateModelName');
    Route::delete('/models/{modelId}', 'deleteModel');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'displayProducts');
    Route::post('/products', 'addProduct');
    Route::patch('/products/{productId}', 'editProduct');
    Route::delete('/products/{productId}', 'deleteProduct');
    Route::get('/products/total', 'getProductTotal');
    Route::get('/products/model/{model}', 'getProductByModel');
    Route::get('/products/brand/{brand}', 'getProductByBrand');
});