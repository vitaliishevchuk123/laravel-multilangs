<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localizationRedirect']
], function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::get(LaravelLocalization::transRoute('routes.catalog'), [CatalogController::class, 'index'])->name('catalog');
    Route::get(LaravelLocalization::transRoute('routes.product'), [ProductController::class, 'index'])->name('product');
});
