<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function(){
    Route::post('/categories', 'addCategory');
    Route::patch('/categories/{categoryId}/name', 'updateCategoryName');
    Route::delete('/categories/{categoryId}', 'deleteCategory');
});