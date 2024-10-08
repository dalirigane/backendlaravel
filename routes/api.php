<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/categories",[CategorieController::class,'index']);
Route::post("/caregories",[CategoriesController::class,'store']);
Route::get("/categorie/{id}",[CategorieController::class,]);
Route::delete("/categories/{id}",[CategorieController::class,'destroy']);
Route::middleware('api')->group(function () {
Route::resource('articles', ArticleController::class);
});
Route::get('/articles/art/articlespaginate', [ArticleController::class,
'articlesPaginate']);